<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Role</title>
</head>
<body>
    <h1>Daftar Role</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID Ras</th>
                <th>Nama Ras</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($role as $data)
                <tr>
                    <td>{{ $data->idrole }}</td>
                    <td>{{ $data->nama_role }}</td>
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