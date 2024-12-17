<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Laporan Lab</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background: #007bff;
            color: #fff;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #f1f1f1;
        }

        td {
            font-size: 14px;
            color: #555;
        }

        .btn-detail {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-detail:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Laporan Lab</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lab ID</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Admin Bimbingan</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporanLabs as $laporan)
                <tr>
                    <td>{{ $laporan->id }}</td>
                    <td>{{ $laporan->lab_id }}</td>
                    <td>{{ $laporan->jam_mulai }}</td>
                    <td>{{ $laporan->jam_selesai }}</td>
                    <td>{{ $laporan->admin_bimbingan }}</td>
                    <td>
                        <a href="{{ route('laporan.detail', $laporan->id) }}" class="btn-detail">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
