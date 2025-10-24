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
                <th>ID role user</th>
                <th>ID user</th>
                <th>ID role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roleUser as $data)
                <tr>
                    <td>{{ $data->iduser }}</td>
                    <td>{{ $data->user->nama }}</td>
                    <td>{{ $data->role->nama_role }}</td>
                    <td>{{ $data->status }}</td>

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