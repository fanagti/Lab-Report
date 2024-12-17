<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user</title>
    {{-- <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .has-item {
            background-color: #28a745;
            /* Green */
            color: white;
        }

        .no-item {
            background-color: #dc3545;
            /* Red */
            color: white;
        }

        .item-icon {
            font-size: 1.5em;
        }

        .icon-box {
            width: 2.5em;
            /* Adjust width to fit the icon */
            height: 2.5em;
            /* Adjust height to fit the icon */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.25em;
            margin-left: 0.25em;
        }

        .incomplete::after {
            content: '!';
            color: white;
            font-weight: bold;
            position: absolute;
            top: 0;
            right: 0;
            margin-top: -8px;
            margin-right: -8px;
            background: red;
            border-radius: 50%;
            padding: 0.2em 0.4em;
        }

        .cbx {
            opacity: 0;
            width: 2.5em;
            /* Adjust width to fit the icon */
            height: 2.5em;
            /* Adjust height to fit the icon */
        }

        .cbx:checked {
            opacity: 0;

        }

        .tooltip {
            position: absolute;
            bottom: 50px;
            /* Adjusted to position above the box */
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
        }

        .tooltip::after {
            content: "";
            position: absolute;
            top: 100%;
            /* Position below the tooltip box */
            left: 50%;
            transform: translateX(-50%);
            border-width: 5px;
            border-style: solid;
            border-color: #333 transparent transparent transparent;
            /* Triangle pointing down */
        }

        .pc-detail:hover+.tooltip {
            opacity: 1;
            visibility: visible;
        }

        .form-select {
            border: none;
            border-bottom: 2px solid #ced4da;
            border-radius: 0;
            box-shadow: none;
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            width: 100%;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #218838;
            color: #fff
        }

        .custom-alert {
            position: fixed;
            top: -100px;
            /* Awal di luar layar */
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            z-index: 1050;
            /* Agar alert berada di atas elemen lain */
        }

        /* Ketika alert aktif */
        .custom-alert.show {
            animation: slideDown 0.5s ease-in-out forwards;
            /* Animasi masuk */
        }

        /* Animasi masuk */
        @keyframes slideDown {
            0% {
                top: -100px;
                opacity: 0;
            }

            100% {
                top: 20px;
                opacity: 1;
            }
        }

        /* Animasi keluar */
        @keyframes slideUp {
            0% {
                top: 20px;
                opacity: 1;
            }

            100% {
                top: -50px;
                opacity: 0;
            }
        }

        /* Styling utama untuk alert */
        .my-alert {
            position: fixed;
            top: -100px;
            /* Awal di luar layar */
            left: 50%;
            transform: translateX(-50%);
            min-width: 300px;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            z-index: 1050;
            opacity: 0;
            /* Tidak terlihat saat awal */
            transition: all 0.4s ease-in-out;
        }

        .my-alert-success {
            background-color: #66d432;
            color: #fff;
            border: 1px solid #82d05e;
        }
    </style>
</head>

<body>
    <div class="container col-9">
        {{ $slot }}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cari semua checkbox dengan kelas 'status-toggle'
            const checkboxes = document.querySelectorAll(".status-toggle");

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", function() {
                    // ID elemen target dari data-target
                    const targetId = this.getAttribute("data-target");
                    const targetElement = document.getElementById(targetId);

                    if (this.checked) {
                        // Jika dicentang, tambahkan kelas 'has-item' dan hapus 'no-item'
                        targetElement.classList.add("has-item");
                        targetElement.classList.remove("no-item");
                    } else {
                        // Jika tidak dicentang, tambahkan kelas 'no-item' dan hapus 'has-item'
                        targetElement.classList.add("no-item");
                        targetElement.classList.remove("has-item");
                    }
                });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.submitForm').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Mencegah form langsung terkirim

                // Menampilkan SweetAlert untuk konfirmasi
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "apakah data ini dapat dipertanggung jawabkan? ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oke',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirim form setelah konfirmasi
                        e.target.submit(); // Mengirimkan form setelah konfirmasi
                    }
                });
            });
        });
    </script>

    <script>
        function showAlert(message) {
            // Membuat elemen alert baru
            const alertElement = document.createElement('div');
            alertElement.className = 'alert my-alert-success custom-alert show';
            alertElement.innerHTML = '<i class="fa-solid fa-triangle-exclamation fa-lg"></i>' + '         ' + message;

            // Menambahkan elemen alert ke body
            document.body.appendChild(alertElement);

            // Menghapus alert setelah 3 detik dengan animasi keluar
            setTimeout(() => {
                alertElement.style.animation = "slideUp 0.5s ease-in-out forwards"; // Animasi keluar
            }, 3000);

            // Menghapus elemen dari DOM setelah animasi selesai
            setTimeout(() => {
                alertElement.remove();
            }, 3500);
        }

        // Menangkap pesan dari session
        @if (session('success'))
            showAlert("{{ session('success') }}");
        @endif
    </script>
</body>

</html>
