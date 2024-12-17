<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan Lab</title>
    <style>
        /* Global styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #3f51b5;
        }

        /* Styling for the PC list */
        .pc-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .pc-item {
            padding: 20px;
            background-color: #e1f5fe;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .pc-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .pc-item span {
            font-size: 18px;
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .pc-item p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        /* Flash message styling */
        .alert-success {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
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
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: #5c6bc0;
        }
        label{
            display: block
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Laporan - PC</h2>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <!-- Menampilkan jumlah monitor yang tidak ada -->
        <p><strong>Jumlah Monitor yang Tidak Ada: </strong>{{ $monitorTidakAda }}</p>
        
        <!-- Menampilkan jumlah mouse yang tidak ada -->
        <p><strong>Jumlah Mouse yang Tidak Ada: </strong>{{ $mouseTidakAda }}</p>
        <p><strong>Jumlah keyboard yang Tidak Ada: </strong>{{ $keyboardTidakAda }}</p>

        <!-- Daftar PC -->
        <div class="pc-list">
            @foreach ($pcs as $pc)
                @php
                    // Cek apakah ada detail laporan untuk PC ini
                    $detail = $detailLaporanLabs->firstWhere('pc_id', $pc->id);
                @endphp

                <div class="pc-item">
                    <span>PC ID: {{ $pc->id }}</span>

                    <!-- Checkbox untuk mengubah status monitor -->
                    <label>
                        Monitor: 
                        <input type="checkbox" name="pcs[{{ $pc->id }}][has_monitor]" 
                        {{ $detail && !$detail->has_monitor ? '' : 'checked' }}>
                    </label>

                    <!-- Checkbox untuk mengubah status keyboard -->
                    <label>
                        Keyboard: 
                        <input type="checkbox" name="pcs[{{ $pc->id }}][has_keyboard]" 
                        {{ $detail && !$detail->has_keyboard ? '' : 'checked' }}>
                    </label>

                    <!-- Checkbox untuk mengubah status mouse -->
                    <label>
                        Mouse: 
                        <input type="checkbox" name="pcs[{{ $pc->id }}][has_mouse]" 
                        {{ $detail && !$detail->has_mouse ? '' : 'checked' }}>
                    </label>

                    <!-- Checkbox untuk mengubah status PC -->
                    <label>
                        Has PC: 
                        <input type="checkbox" name="pcs[{{ $pc->id }}][has_pc]" 
                        {{ $detail && !$detail->has_pc ? '' : 'checked' }}>
                    </label>
                </div>
            @endforeach
        </div>

        <!-- Tombol kembali -->
        <a href="{{ url()->previous() }}" class="back-btn">Kembali</a>
    </div>
</body>
</html>
