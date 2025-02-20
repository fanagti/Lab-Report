<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    Soft UI Lab Report
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
  {{-- sweeet --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    /* seet */
    /* Custom CSS untuk tombol */
    .swal2-cancel {
      background-color: #ea0606 !important;
      border-color: #ea0606 !important;
    }

    .swal2-confirm {
      background-color: #17ad37 !important;
      border-color: #17ad37 !important;
    }
    /* ------------------------------------------- */

        .icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }
        .icon-purple {
            color: #9b59b6;
        }
        .icon-green {
            color: #2ecc71;
        }
        .icon-red {
            color: #e74c3c;
        }
        .icon-yellow {
            color: #f1c40f;
        }
        .icon-blue {
            color: #3498db;
        }
        .icon-orange {
            color: #e67e22;
        }

        .my-card {
            border-radius: 10px;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .my-card-blue {
            background-color: #007bff;
        }
        .my-card-green {
            background-color: #28a745;
        }
        .my-card-red {
            background-color: #dc3545;
        }
        .my-container {
            margin-top: 50px;
        }
        .my-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .kotak{
          width: 100%;
          min-height: 70px;
          color: white;
          padding: 10px;
        }
        .k-1{
          border-start-start-radius: 10px;
        }
        .k-2{
          border-start-end-radius: 10px;
        }
        .k-3{
          border-end-start-radius: 10px;
        }
        .k-4{
          border-end-end-radius: 10px;
        }
        .border-f{
          border-radius: 10px;
        }
        .has-item {
          background-color: #28a745; /* Green */
          color: white;
        }

        .no-item {
          background-color: #dc3545; /* Red */
          color: white;
        }

        .item-icon {
          font-size: 1.5em;
        }

        .icon-box {
          width: 2.5em; /* Adjust width to fit the icon */
          height: 2.5em; /* Adjust height to fit the icon */
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
          padding: 0.2em 0.8em;
        }
        .cbx{
          opacity: 0;
          width: 2.5em; /* Adjust width to fit the icon */
          height: 2.5em; /* Adjust height to fit the icon */
        }
        .cbx:checked{
          opacity: 0;

        }
        .tooltip {
            position: absolute;
            bottom: 50px; /* Adjusted to position above the box */
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
            top: 100%; /* Position below the tooltip box */
            left: 50%;
            transform: translateX(-50%);
            border-width: 5px;
            border-style: solid;
            border-color: #333 transparent transparent transparent; /* Triangle pointing down */
        }

        .pc-detail:hover + .tooltip {
            opacity: 1;
            visibility: visible;
        }
            /* Styling untuk posisi alert di atas tengah */
    .custom-alert {
      position: fixed;
      top: -100px; /* Awal di luar layar */
      left: 50%;
      transform: translateX(-50%);
      opacity: 0;
      z-index: 1050; /* Agar alert berada di atas elemen lain */
    }

    /* Ketika alert aktif */
    .custom-alert.show {
      animation: slideDown 0.5s ease-in-out forwards; /* Animasi masuk */
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
    top: -100px; /* Awal di luar layar */
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
    opacity: 0; /* Tidak terlihat saat awal */
    transition: all 0.4s ease-in-out;
  }
  .my-alert-success {
    background-color: #66d432;
    color: #fff;
    border: 1px solid #82d05e;
  }
  </style>

</head>

<body class="g-sidenav-show  bg-gray-100">
<x-admin.sidebar>

</x-admin.sidebar>
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
      <x-admin.navbar>

      </x-admin.navbar>
    <!-- Navbar -->

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        {{ $slot }}
    </div>
  </main>


  <!--   Core JS Files   -->



  <script>
        // Fungsi untuk toggle status tombol
        function toggleStatus(button) {
      if (button.classList.contains("btn-success")) {
        button.textContent = "Disable";
        button.classList.remove("btn-success");
        button.classList.add("btn-danger");
      } else {
        button.textContent = "Enable";
        button.classList.remove("btn-danger");
        button.classList.add("btn-success");
      }
    }
  </script>
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  {{-- sweet  --}}
  <script>
    // Menambahkan event listener untuk semua form dengan class 'deleteForm'
    document.querySelectorAll('.deleteForm').forEach(function(form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form langsung terkirim

        // Menampilkan SweetAlert untuk konfirmasi
        Swal.fire({
          title: 'Apakah kamu yakin?',
          text: "Data ini akan dihapus permanen",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'oke',
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

    document.querySelectorAll('.updateForm').forEach(function(form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form langsung terkirim

        // Menampilkan SweetAlert untuk konfirmasi
        Swal.fire({
          title: 'Apakah kamu yakin?',
          text: "Data ini akan diupdate",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'oke',
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

    document.querySelectorAll('.changeForm').forEach(function(form) {
      form.addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form langsung terkirim

        // Menampilkan SweetAlert untuk konfirmasi
        Swal.fire({
          title: 'Apakah kamu yakin?',
          text: "Data ini akan diubah",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'oke',
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
    alertElement.innerHTML = '<i class="fa-solid fa-triangle-exclamation fa-lg"></i>'+'         '+ message;

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
  @if(session('success'))
    showAlert("{{ session('success') }}");
  @endif
</script>

</body>

</html>
