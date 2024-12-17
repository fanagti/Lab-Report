<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lab dan PC</title>
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
    transition: background-color 0.3s;
}

.lab-item:hover {
    background-color: #3f51b5;
}

/* Styling for the list of PCs */
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

    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Lab</h1>
        
        <!-- Daftar Lab -->
        <div class="labs-list">
            @foreach($labs as $lab)
                <a href="{{ url('/lab/' . $lab->id) }}" class="lab-item">
                    <h2>{{ $lab->name }}</h2>
                </a>
            @endforeach
        </div>
    </div>
    <div class="container">
        <h1>Daftar Lab</h1>
        
        <!-- Daftar Lab -->
        <div class="labs-list">
            @foreach($labs as $lab)
                <div class="lab-item" onclick="showPCs({{ $lab->id }})">
                    <h2>{{ $lab->name }}</h2>
                </div>
            @endforeach
        </div>
        
        <!-- Daftar PC -->
        <div class="pc-list" id="pc-list">
            <!-- PC akan ditampilkan di sini -->
        </div>
    </div>

    <script>
        function showPCs(labId) {
    // Mengambil data PC berdasarkan labId menggunakan AJAX
    fetch(`/lab/${labId}/pcs`)
        .then(response => response.json())
        .then(data => {
            console.log(data);  // Cek data yang diterima dari server

            const pcListDiv = document.getElementById('pc-list');
            pcListDiv.innerHTML = '';  // Clear previous PC list
            
            if (data.pcs.length === 0) {
                pcListDiv.innerHTML = '<p>Lab ini tidak memiliki PC.</p>';
            } else {
                // Gunakan nama lab yang dikirim dari server
                let pcListHTML = '<h2>PC di Lab ' + data.lab_name + '</h2>';

                // Loop untuk menampilkan data PC
                data.pcs.forEach(pc => {
                    pcListHTML += `
                        <div class="pc-item">
                            <p>PC ID: ${pc.id}</p>
                            <p>Monitor: ${pc.has_monitor ? 'Ada' : 'Tidak Ada'}</p>
                            <p>Keyboard: ${pc.has_keyboard ? 'Ada' : 'Tidak Ada'}</p>
                            <p>Mouse: ${pc.has_mouse ? 'Ada' : 'Tidak Ada'}</p>
                        </div>
                    `;
                });

                pcListDiv.innerHTML = pcListHTML;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

    </script>
</body>
</html>
