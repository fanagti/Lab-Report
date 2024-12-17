<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan Labs</title>
   <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

thead {
    background-color: #007bff;
    color: #ffffff;
}

th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.available {
    color: #28a745;
    font-weight: bold;
}

.unavailable {
    color: #dc3545;
    font-weight: bold;
}

   </style>
</head>
<body>
    <div class="container">
        <h1>Detail Laporan Labs</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Laporan Lab ID</th>
                    <th>Lab ID</th>
                    <th>PC ID</th>
                    <th>Monitor</th>
                    <th>Keyboard</th>
                    <th>Mouse</th>
                    <th>PC</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->laporanlab->admin_bimbingan }}</td>
                    <td>{{ $detail->lab->name }}</td>
                    <td>{{ $detail->pc_id }}</td>
                    <td class="{{ $detail->has_monitor ? 'available' : 'unavailable' }}">
                        {{ $detail->has_monitor ? 'Tersedia' : 'Tidak Tersedia' }}
                    </td>
                    <td class="{{ $detail->has_keyboard ? 'available' : 'unavailable' }}">
                        {{ $detail->has_keyboard ? 'Tersedia' : 'Tidak Tersedia' }}
                    </td>
                    <td class="{{ $detail->has_mouse ? 'available' : 'unavailable' }}">
                        {{ $detail->has_mouse ? 'Tersedia' : 'Tidak Tersedia' }}
                    </td>
                    <td class="{{ $detail->has_pc ? 'available' : 'unavailable' }}">
                        {{ $detail->has_pc ? 'Tersedia' : 'Tidak Tersedia' }}
                    </td>
                    <td>{{ $detail->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
