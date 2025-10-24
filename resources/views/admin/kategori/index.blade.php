<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
</head>
<body>
    <h1>Daftar Kategori</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $item)
                <tr>
                    <td>{{ $item->idkategori }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                </tr>
            @empty
                <tr><td colspan="2">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>