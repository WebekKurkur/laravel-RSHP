<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kode Tindakan Terapi</title>
</head>
<body>
    <h1>Daftar Kode Tindakan Terapi</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Kategori Klinis</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kodeTindakanTerapi as $item)
                <tr>
                    <td>{{ $item->idkode_tindakan_terapi }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->deskripsi_tindakan_terapi }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $item->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="5">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>