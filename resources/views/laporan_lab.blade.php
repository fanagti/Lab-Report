<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Lab</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .form-container input[type="text"],
        .form-container input[type="time"],
        .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        /* Error styling */
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Form Laporan Lab</h2>
        
        <!-- Pesan sukses atau error -->
        @if(session('success'))
            <div class="success" style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <form action="/laporan-lab" method="POST">
            @csrf
            <div>
                <label for="lab">Lab yang Digunakan</label>
                <select name="lab_id" id="lab" required>
                    <option value="">Pilih Lab</option>
                    @foreach ($labs as $lab)
                        <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                    @endforeach
                </select>
                @error('lab_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" id="jam_mulai" name="jam_mulai" required>
                @error('jam_mulai')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" id="jam_selesai" name="jam_selesai" required>
                @error('jam_selesai')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="admin_bimbingan">Nama Admin yang Membimbing</label>
                <input type="text" id="admin_bimbingan" name="admin_bimbingan" required>
                @error('admin_bimbingan')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Kirim Laporan</button>
        </form>
    </div>

</body>
</html>
