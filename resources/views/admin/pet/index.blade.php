<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pet</title>
</head>
<body>
    <h1>Daftar Pet</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Warna / Tanda</th>
                <th>Jenis Kelamin</th>
                <th>Nama Pemilik</th>
                <th>Ras Hewan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pet as $item)
                <tr>
                    <td>{{ $item->idpet }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->warna_tanda }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->pemilik->user->nama}}</td>
                    <td>{{ $item->rasHewan->nama_ras}}</td>
                </tr>
            @empty
                <tr><td colspan="7">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>