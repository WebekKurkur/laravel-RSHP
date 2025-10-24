<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Ras Hewan</title>
</head>
<body>
    <h1>Daftar Ras Hewan</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID Ras</th>
                <th>Nama Ras</th>
                <th>Jenis Hewan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rasHewan as $data)
                <tr>
                    <td>{{ $data->idras_hewan }}</td>
                    <td>{{ $data->nama_ras }}</td>
                    <td>{{ $data->jenisHewan->nama_jenis_hewan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>