<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan Penggunaan Lab</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f8e9;
            /* Background yang lebih cerah dan segar */

        }

        .container {
            margin-top: 50px;
            max-width: 1000px;
            /* Lebar container lebih besar */
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #000000;
            /* Hijau muda yang lebih segar */
        }

        .form-label {
            font-weight: bold;
            color: #000000;
            /* Warna hijau yang cerah untuk label */
        }

        .btn-submit {
            background-color: #66bb6a;
            /* Hijau muda yang lebih terang */
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #81c784;
            color: white;
            /* Hijau muda saat hover */
            cursor: pointer;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 12px;
            background-color: #ffffff;
            /* Latar belakang input yang lebih lembut */
            border: 1px solid #5f5f5f;
            /* Border hijau muda yang halus */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .invalid-feedback {
            font-size: 12px;
            color: #e53935;
            /* Merah terang untuk error */
        }

        .row label {
            font-size: 14px;
        }

        .lab-list {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .status {
            font-weight: bold;
            font-size: 14px;
            /* Menyesuaikan ukuran font status */
        }

        .lab-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 15px;

            border-radius: 8px;
            font-size: 14px;
            height: 40px;
            transition: background-color 0.3s ease, opacity 0.3s ease;
        }

        /* Tambahan untuk lab-item yang non-aktif */
        .lab-disabled {
            background-color: #f1f1f1;
            /* Warna latar belakang abu-abu muda */
            border: 1px solid #6d6d6d;
            opacity: 0.6;
            /* Efek pudar */
            pointer-events: none;
            /* Menonaktifkan interaksi */
        }

        /* Status yang digunakan */
        .status-used {
            color: #ff0000;
            /* Abu-abu untuk 'Unused' */
        }

        /* Status yang tidak digunakan */
        .status-unused {
            color: #4caf50;
            /* Hijau untuk 'Used' */
        }

        .border-used {
            border: 1px solid #e6c8c8;
            ;
            /* Abu-abu untuk 'Unused' */
        }

        /* border yang tidak digunakan */
        .border-unused {
            border: 1px solid #c8e6c9;
            /* Hijau untuk 'Used' */
        }

        /* Menambahkan garis coret pada nama lab ketika statusnya 'Unused' */
        .lab-disabled span:first-child {
            text-decoration: line-through;
            /* Menambahkan garis coret pada nama lab */
            color: #9e9e9e;
            /* Merubah warna nama lab menjadi abu-abu ketika dinonaktifkan */
        }

        .modal-header-green {
            background-color: #f1f8e9;
            /* Warna hijau */

        }

        .modal-body-green {
            background-color: #f1f8e9;
            /* Warna hijau */
        }

        .modal-footer-green {
            background-color: #f1f8e9;
            /* Warna hijau */

        }

        .table th,
        .table td {
            text-align: center;
        }

        /* Custom Width for Modal */
        .modal-lg-custom {
            max-width: 80%;
            /* Atur lebar modal sesuai keinginan */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Tombol dropdown */


        /* Menu dropdown */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            /* Latar belakang putih */
            min-width: 160px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Efek bayangan */
            border-radius: 4px;
            z-index: 1;
        }

        /* Item dropdown */
        .dropdown-content a {
            color: black;
            /* Warna teks hitam */
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
            /* Warna abu-abu muda saat hover */
        }

        /* Tampilkan menu saat hover */
        .dropdown:hover .dropdown-content {
            display: block;
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="modal-dialog-custom">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header modal-header-green">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Riwayat Laporan Lab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body with Table -->
                <div class="modal-body modal-body-green">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lab</th>
                                    <th>Jam mulai</th>
                                    <th>Jam selesai</th>
                                    <th>Guru</th>
                                    <th>Mapel</th>
                                    <th>Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $laporanDetail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $laporanDetail->lab->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($laporanDetail->jam_mulai)->format('H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($laporanDetail->jam_selesai)->format('H:i') }}</td>
                                        <td>{{ $laporanDetail->guru->name }}</td>
                                        <td>{{ $laporanDetail->mapel->name }}</td>
                                        <td>{{ $laporanDetail->created_at->format('d-M-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer modal-footer-green">
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <!-- Kolom Kiri: Form Input Laporan -->
        <div class="form-container row">
            <div class="row">
                <div class="col-11">
                    <h2>Form Laporan Penggunaan Lab</h2>
                </div>
                <div class="col-1">
                    <div class="row">
                        <div class="col-6">
                            <a onclick="event.preventDefault();" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="row mt-2">
                                    <i class="fa-solid fa-clock-rotate-left fa-lg"></i>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="text-body font-weight-bold px-0">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>
                            </a>
                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                @if($is_user_has_reported)
                    <h5><b>{{ Auth::user()->class }} </b> melaporkan pengguaan lab<h5>
                @else
                <form action="/laporan-lab" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Dropdown Lab -->
                        <div class="col-md-12 mb-3 form-group">
                            <label for="lab_id" class="form-label">Pilih Lab</label>
                            <select class="form-select @error('lab_id') is-invalid @enderror" name="lab_id"
                                id="lab_id">
                                <option value="">-- Pilih Lab --</option>
                                @foreach ($labs as $lab)
                                    @if ($lab->status == 1 && $lab->used == 0)
                                        <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                                    @else
                                    @endif
                                @endforeach
                            </select>
                            @error('lab_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Dropdown Guru -->
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3 form-group">
                            <label for="guru_id" class="form-label">Pilih Guru</label>
                            <select class="form-select @error('guru_id') is-invalid @enderror" name="guru_id"
                                id="guru_id" onchange="loadMapelByGuru()">
                                <option value="">-- Pilih Guru --</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}"
                                        {{ old('guru_id') == $guru->id ? 'selected' : '' }}>{{ $guru->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('guru_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Dropdown Mapel (Dinamically populated based on selected guru) -->
                        <div class="col-md-6 mb-3 form-group">
                            <label for="mapel_id" class="form-label">Pilih Mata Pelajaran</label>
                            <select class="form-select @error('mapel_id') is-invalid @enderror" name="mapel_id"
                                id="mapel_id">
                                <option value="">-- Pilih Mata Pelajaran --</option>
                            </select>
                            @error('mapel_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Input Jam Mulai -->
                        <div class="col-md-6 mb-3 form-group">

                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror"
                                name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai') }}" lang="en-GB" step="60">
                            @error('jam_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Jam Selesai -->
                        <div class="col-md-6 mb-3 form-group">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror"
                                name="jam_selesai" id="jam_selesai" value="{{ old('jam_selesai') }}">
                            @error('jam_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-submit">Simpan Laporan</button>
                    </div>
                </form>
                @endif
            </div>
            <div class="col-md-6 mt-5 mt-sm-0">

                <!-- Daftar Lab -->
                @foreach ($labs as $lab)

                    <div
                        class="lab-item {{ $lab->status == 0 ? 'lab-disabled' : '' }}  {{ $lab->status == 1 ? ($lab->used == 1 ? 'border-used' : 'border-unused') : '' }}">
                        <span>{{ $lab->name }}

                            @if ($lab->user != null)
                                &ensp;<i class="fa fa-user" aria-hidden="true"></i> {{ $lab->user->class }}
                                &ensp;<i class="fa fa-clock" aria-hidden="true"></i> {{ $lab->time_usage }}
                            @endif
                        </span>
                        <!-- Nama lab di kiri -->
                        <span
                            class="status {{ $lab->status == 1 ? ($lab->used == 1 ? 'status-used' : 'status-unused') : '' }}">
                            {{ $lab->status == 1 ? ($lab->used == 1 ? 'Used' : 'Unused') : 'Disable' }}
                        </span> <!-- Status lab di kanan -->
                    </div>
                @endforeach

            </div>
        </div>



    </div>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // JavaScript untuk memuat mata pelajaran berdasarkan guru yang dipilih
        function loadMapelByGuru() {
            let guruId = document.getElementById('guru_id').value;

            if (guruId) {
                // Menggunakan AJAX untuk memuat mata pelajaran berdasarkan guru
                fetch(`/api/mapel/${guruId}`)
                    .then(response => response.json())
                    .then(data => {
                        let mapelSelect = document.getElementById('mapel_id');
                        mapelSelect.innerHTML = '<option value="">-- Pilih Mata Pelajaran --</option>'; // Reset pilihan
                        data.mapels.forEach(mapel => {
                            let option = document.createElement('option');
                            option.value = mapel.id;
                            option.textContent = mapel.name;
                            mapelSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error loading mapel:', error));
            } else {
                document.getElementById('mapel_id').innerHTML = '<option value="">-- Pilih Mata Pelajaran --</option>';
            }
        }
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
