<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TemuDokter;
use App\Models\Pet;
use App\Models\Role;
use App\Models\RoleUser;
use Carbon\Carbon;

class TemuDokterController extends Controller
{
    public function index()
    {
        $items = TemuDokter::with(['pet.pemilik.user','roleUser.user'])
            ->orderBy('waktu_daftar', 'desc')
            ->orderBy('no_urut')
            ->get();

        return view('resepsionis.temu.index', compact('items'));
    }

    public function create()
    {
        $pets = Pet::with('pemilik')->get();

        $role = Role::where('nama_role', 'dokter')->first();
        $doctors = collect();
        if ($role) {
            $doctors = RoleUser::where('idrole', $role->idrole)->where('status', 1)->with('user')->get();
        }

        return view('resepsionis.temu.create', compact('pets','doctors'));
    }

    public function store(Request $request)
    {
        $data = $this->validateTemu($request);

        $tanggal = isset($data['tanggal'])
            ? Carbon::parse($data['tanggal'])->setTimezone('Asia/Jakarta')->toDateString()
            : Carbon::now('Asia/Jakarta')->toDateString();

        $nomor = $this->computeNomorForDate($tanggal);

        try {
            $waktuDaftar = $this->buildWaktuDaftar($tanggal);

            TemuDokter::create([
                'idpet' => $data['pet_id'],
                'idrole_user' => $data['dokter_id'],
                'waktu_daftar' => $waktuDaftar->toDateTimeString(),
                'no_urut' => $nomor,
                'status' => '1',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mendaftar temu dokter: ' . $e->getMessage());
        }

        return redirect()->route('resepsionis.temu.index')->with('success', 'Temu dokter berhasil didaftarkan. Nomor urut: ' . $nomor);
    }

    protected function validateTemu(Request $request)
    {
        return $request->validate([
            'pet_id' => 'required|integer',
            'dokter_id' => 'required|integer',
            'tanggal' => 'nullable|date',
        ]);
    }

    protected function computeNomorForDate($tanggal)
    {
        return TemuDokter::whereDate('waktu_daftar', $tanggal)->count() + 1;
    }

    protected function buildWaktuDaftar($tanggal)
    {
        $nowJakarta = Carbon::now('Asia/Jakarta');
        if ($tanggal) {
            return Carbon::createFromFormat('Y-m-d', $tanggal, 'Asia/Jakarta')
                ->setTime($nowJakarta->hour, $nowJakarta->minute, $nowJakarta->second);
        }
        return $nowJakarta;
    }
}
