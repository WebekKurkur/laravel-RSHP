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
                <th>ID user</th>
                <th>Nama user</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user as $data)
                <tr>
                    <td>{{ $data->iduser }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->password }}</td>

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