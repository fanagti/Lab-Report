<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lab - {{ $lab->name }}</title>
    <style>
        /* Reset some default styles */
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
        <h1>Detail Lab: {{ $lab->name }}</h1>
        <p>Status: {{ $lab->status }}</p>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulir untuk batch update -->
        <h2>Batch Update Status PC</h2>
        <form action="{{ url('/pcs/batch-update/'.$labId."/".$laporanId) }}" method="POST">
            @csrf
            <div class="pc-list">
                @foreach($lab->pcs as $pc)
                    <div class="pc-item">
                        <input type="checkbox" name="pcs[]" value="{{ $pc->id }}">
                        <span>PC ID: {{ $pc->id }}</span>
                        <p>Monitor: {{ $pc->has_monitor ? 'Ada' : 'Tidak Ada' }}</p>
                        <p>Keyboard: {{ $pc->has_keyboard ? 'Ada' : 'Tidak Ada' }}</p>
                        <p>Mouse: {{ $pc->has_mouse ? 'Ada' : 'Tidak Ada' }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Batch Update Form -->
            <div class="batch-update-form">
                <h3>Update Status untuk PC Terpilih</h3>
                
                <label for="has_monitor">Monitor:</label>
                <input type="checkbox" name="has_monitor" id="has_monitor">
                <br>

                <label for="has_keyboard">Keyboard:</label>
                <input type="checkbox" name="has_keyboard" id="has_keyboard">
                <br>

                <label for="has_mouse">Mouse:</label>
                <input type="checkbox" name="has_mouse" id="has_mouse">
                <br>

                <button type="submit">Update PC Terpilih</button>
            </div>
        </form>

        <h2>Update Setiap PC Individu</h2>
        <!-- Formulir untuk update status setiap PC -->
        @foreach($lab->pcs as $pc)
            <form action="{{ url('/pcs/'.$pc->id.'/update/'.$labId."/".$laporanId) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="pc-item">
                    <h3>PC ID: {{ $pc->id }}</h3>
                    <p>Monitor: 
                        <input type="checkbox" name="has_monitor" {{ $pc->has_monitor ? 'checked' : '' }}>
                    </p>
                    <p>Keyboard:
                        <input type="checkbox" name="has_keyboard" {{ $pc->has_keyboard ? 'checked' : '' }}>
                    </p>
                    <p>Mouse:
                        <input type="checkbox" name="has_mouse" {{ $pc->has_mouse ? 'checked' : '' }}>
                    </p>
                    <button type="submit">Update PC</button>
                </div>
            </form>
        @endforeach

        <a href="{{ url('/labs') }}" class="back-btn">Kembali ke Daftar Lab</a>
    </div>

    <h2>Update Semua PC di Lab</h2>

<!-- Formulir untuk update status semua PC -->
<form action="{{ url('/pcs/update/'.$labId.'/'.$laporanId) }}" method="POST">
    @csrf
    @method('PUT')

    @foreach($lab->pcs as $pc)
        <div class="pc-item border rounded p-3 mb-3">
            <h3>PC ID: {{ $pc->id }}</h3>
            <p>Monitor:
                <input type="checkbox" name="pcs[{{ $pc->id }}][has_monitor]" 
                       {{ $pc->has_monitor ? 'checked' : '' }}>
            </p>
            <p>Keyboard:
                <input type="checkbox" name="pcs[{{ $pc->id }}][has_keyboard]" 
                       {{ $pc->has_keyboard ? 'checked' : '' }}>
            </p>
            <p>Mouse:
                <input type="checkbox" name="pcs[{{ $pc->id }}][has_mouse]" 
                       {{ $pc->has_mouse ? 'checked' : '' }}>
            </p>
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Update Semua PC</button>
</form>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</body>

</html>
