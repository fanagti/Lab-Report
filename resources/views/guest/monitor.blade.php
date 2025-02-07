<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 10px;
            margin-bottom: 10px;
            width: 240px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-used { border: 3px solid #ff0000; } /* Merah untuk lab yang digunakan */
        .card-unused { border: 3px solid #4caf50; } /* Hijau untuk lab yang tidak digunakan */
        .card-offline { border: 3px solid #808080; } /* Abu-abu untuk status 0 */
        
        .body { padding: 15px; }
        
        .footer {
            font-size: 0.8rem;
            text-align: center;
            padding: 5px;
            width: 100%;
            color: white;
            font-weight: bold;
        }
        .footer-used { background-color: #ff0000; } /* Merah */
        .footer-unused { background-color: #4caf50; } /* Hijau */
        .footer-offline { background-color: #808080; } /* Abu-abu */
        
        .content { flex-grow: 1; }
        .body div { margin-bottom: 5px; }
    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body style="background-color: #f1f1f1ea">
    <div class="container mt-3">
        <div class="time-container text-center mb-3">
            <h1 class="time me-4">
                <i class="fa-solid fa-clock"></i> <span id="real-time">00:00:00</span>
            </h1>
            <h6 id="current-date">01 January 2025</h6>
        </div>
        <div class="row gy-2" id="lab-container">
            <!-- Data akan dimasukkan di sini oleh JavaScript -->
        </div>
    </div>

    <script>
        let previousData = null; // Menyimpan data sebelumnya untuk perbandingan

        function fetchData() {
            fetch("http://e-lab.test/api/monitor")
                .then(response => response.json()) // Konversi response ke JSON
                .then(data => {
                    // Jika data API berubah, update tampilan
                    if (JSON.stringify(data.data) !== JSON.stringify(previousData)) {
                        console.log("Data berubah! Memperbarui tampilan...");
                        updateUI(data.data);
                        previousData = data.data; // Simpan data terbaru
                    } else {
                        console.log("Tidak ada perubahan pada data.");
                    }
                })
                .catch(error => console.error("Error fetching data:", error));
        }

        function updateUI(data) {
            let labContainer = document.getElementById("lab-container");
            labContainer.innerHTML = ""; // Hapus data lama sebelum menampilkan yang baru

            data.forEach(lab => {
                let isUsed = lab.used === 1;
                let isOffline = lab.status === 0; // Jika status = 0, dianggap offline

                let cardClass = isOffline ? 'card-offline' : (isUsed ? 'card-used' : 'card-unused');
                let footerClass = isOffline ? 'footer-offline' : (isUsed ? 'footer-used' : 'footer-unused');

                let cardHtml = `
                    <div class="col-md-3">
                        <div class="card ${cardClass} mx-auto">
                            <div class="content">
                                <div class="body">
                                    <div class="fw-bold">${lab.lab_name} ${isUsed ? '- ' + (lab.user?.class || 'N/A') : ''}</div>
                                    ${isOffline ? `
                                        <div class="text-muted">Lab Offline</div>
                                    ` : isUsed ? `
                                        <small>${lab.guru_name} - ${lab.mapel_name}</small>
                                        <br/>
                                        <small>${lab.jam_mulai} - ${lab.jam_selesai}</small>
                                    ` : `
                                        <div class="text-muted">${lab.message}</div>
                                    `}
                                </div>
                            </div>
                            <div class="footer ${footerClass}">
                                ${isOffline ? 'Offline' : (isUsed ? 'Dipakai' : 'Tidak Dipakai')}
                            </div>
                        </div>
                    </div>
                `;

                labContainer.innerHTML += cardHtml;
            });
        }

        fetchData(); // Panggil saat pertama kali halaman dimuat
        setInterval(fetchData, 90 * 1000); // Cek API setiap 15 detik
    </script>
    <script>
        function updateTime() {
            let now = new Date();
            let hours = now.getHours().toString().padStart(2, "0");
            let minutes = now.getMinutes().toString().padStart(2, "0");
            let seconds = now.getSeconds().toString().padStart(2, "0");
            document.getElementById("real-time").innerText = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateTime, 1000); // Update waktu setiap 1 detik
        updateTime(); // Panggil pertama kali saat halaman dimuat
        function updateDate() {
            let now = new Date();
            let options = { year: 'numeric', month: 'long', day: 'numeric' };
            let today = now.toLocaleDateString('id-ID', options); // Format Indonesia (Bahasa)
            document.getElementById("current-date").innerText = ` ${today}`;
        }
        updateDate();
    </script>

</body>
</html>
