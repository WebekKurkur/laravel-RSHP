<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Jenis Hewan</title>
</head>
<body>
    <h1>Daftar Jenis Hewan</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID Jenis Hewan</th>
                <th>Nama Jenis Hewan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jenisHewan as $data)
                <tr>
                    <td>{{ $data->idjenis_hewan }}</td>
                    <td>{{ $data->nama_jenis_hewan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
