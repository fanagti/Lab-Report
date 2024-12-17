<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan Lab</title>
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

        .detail-item {
            margin: 10px 0;
            font-size: 16px;
        }

        .label {
            font-weight: bold;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    /* Global styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
        padding: 20px;
    }

    .container {
        width: 80%;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Styling for the list of labs */
    .labs-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .lab-item {
        background-color: #5c6bc0;
        color: white;
        padding: 20px;
        border-radius: 8px;
        cursor: pointer;
        width: 200px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .lab-item:hover {
        background-color: #3f51b5;
    }

    /* Styling for the PC list */
    .pc-list {
        margin-top: 30px;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .pc-item {
        padding: 10px;
        background-color: #e1f5fe;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .pc-item p {
        margin: 5px 0;
    }

    /* Styling for the back button */
    .back-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #3f51b5;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .back-btn:hover {
        background-color: #5c6bc0;
    }
    /* Grid layout untuk daftar PC */
    .pc-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    /* Form Batch Update */
    .batch-update-form {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 5px;
        margin-top: 20px;
        border: 1px solid #ddd;
    }

    /* Styling untuk tombol submit */
    button[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Styling untuk checkbox dan label */
    input[type="checkbox"] {
        margin-right: 5px;
    }

    label {
        display: inline-block;
        margin: 10px 0 5px;
    }

    /* Flash message styling */
    .alert-success {
        background-color: #4caf50;
        color: white;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Laporan Lab</h1>
        <div class="detail-item">
            <span class="label">ID Laporan:</span> {{ $laporan->id }}
        </div>
        <div class="detail-item">
            <span class="label">Lab ID:</span> {{ $laporan->lab_id }}
        </div>
        <div class="detail-item">
            <span class="label">Jam Mulai:</span> {{ $laporan->jam_mulai }}
        </div>
        <div class="detail-item">
            <span class="label">Jam Selesai:</span> {{ $laporan->jam_selesai }}
        </div>
        <div class="detail-item">
            <span class="label">Admin Bimbingan:</span> {{ $laporan->admin_bimbingan }}
        </div>

        <h2>Detail Laporan</h2>

<div class="pc-list">
    @foreach ($detailLaporanLabs as $detail)
        <div class="pc-item">
            <!-- Menampilkan ID PC -->
            <span>PC ID: {{ $detail->pc_id }}</span>
            
            <!-- Menampilkan status monitor -->
            <p>Monitor: {{ $detail->has_monitor ? 'Ada' : 'Tidak Ada' }}</p>
            
            <!-- Menampilkan status keyboard -->
            <p>Keyboard: {{ $detail->has_keyboard ? 'Ada' : 'Tidak Ada' }}</p>
            
            <!-- Menampilkan status mouse -->
            <p>Mouse: {{ $detail->has_mouse ? 'Ada' : 'Tidak Ada' }}</p>
            
            <!-- Menampilkan status PC -->
            <p>Has PC: {{ $detail->has_pc ? 'Ada' : 'Tidak Ada' }}</p>
        </div>
    @endforeach
</div>


        <a href="{{ route('laporan.index') }}" class="btn-back">Kembali</a>
    </div>
</body>
</html>
