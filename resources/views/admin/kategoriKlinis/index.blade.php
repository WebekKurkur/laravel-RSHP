<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori Klinis</title>
</head>
<body>
    <h1>Daftar Kategori Klinis</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID Kategori Klinis</th>
                <th>Nama Kategori Klinis</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoriKlinis as $item)
                <tr>
                    <td>{{ $item->idkategori_klinis }}</td>
                    <td>{{ $item->nama_kategori_klinis }}</td>
                </tr>
            @empty
                <tr><td colspan="2">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>