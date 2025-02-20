<x-layout-admin>
    <div class="container mt-5 mb-3">
        <div class="card p-4">
            <h4 class="mb-4"><strong>Detail Laporan</strong></h4>
            <div class="row">
                <div class="col-md-6">
                    <p><i class="fa-solid fa-building icon icon-purple"></i>{{ $laporan->lab->name}}</p>
                    <p><i class="fas fa-book icon icon-green"></i>Mapel {{  $laporan->mapel->name }}</p>
                    <p><i class="fas fa-clock icon icon-red"></i>Jam Selesai: {{ $laporan->jam_selesai }}</p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-chalkboard-teacher icon icon-yellow"></i>Guru {{ $laporan->guru->name }}</p>
                    <p><i class="fas fa-clock icon icon-blue"></i>Jam Mulai: {{ $laporan->jam_mulai }}</p>
                    <p><i class="fas fa-network-wired icon icon-orange"></i>Network: {{ $laporan->network ? 'Connected' : 'Disconnected'}}</p>
                </div>
            </div>
        </div>

        <div class="card mt-2 mb-2">
            <div class="col-md-11 mx-auto mt-3 mb-3 ">
                <div class="row justify-content-around align-items-stretch">

                    <div class="col-sm-4 col-11 mb-3 mb-sm-0">
                        <div class="kotak align-content-center my-card-red border-f" style="height: 100%">
                        <div class="row mt-2">
                            <div class="col-6 ">
                                <i class="fa-solid fa-triangle-exclamation ms-4" style="font-size: calc(3.3125rem + 0.75vw)"></i>
                            </div>
                            <div class="col-6 ">
                                <h1 class="text-white">{{ $countLaporan }}</h1>

                            </div>
                        </div>

                        </div>
                    </div>
                    <div class="col-sm-4 col-11 mb-3 mb-sm-0">
                        <div class="row g-1 ">
                            <div class="col-6">
                                <div class="kotak align-content-center my-card-green k-1 ">
                                    <div class="row gx-0">
                                        <div class="col-6">
                                            <span class="fs-3 ms-2 item-icon"><i class="fa-solid fa-display"></i></span>

                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-white">{{ $monitorAda }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="kotak align-content-center my-card-green k-2">
                                    <div class="row gx-0">
                                        <div class="col-6">
                                            <span class="fs-3 ms-2 item-icon"><i class="fa-solid fa-keyboard"></i></span>

                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-white">{{ $keyboardAda }}</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6 ">
                                <div class="kotak align-content-center my-card-green k-3">
                                    <div class="row gx-0">
                                        <div class="col-6">
                                            <span class="fs-3 ms-2 item-icon"><i class="fa-solid fa-computer-mouse"></i></span>

                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-white">{{ $mouseAda }}</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6 ">
                                <div class="kotak align-content-center my-card-green k-4">
                                    <div class="row gx-0">
                                        <div class="col-6">
                                            <span class="fs-3 ms-2 item-icon"><i class="fa-solid fa-mobile"></i></span>

                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-white">{{ $pcAda }}</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-sm-4 col-11">
                        <div class="row g-1 ">
                            <div class="col-6 ">
                                <div class="kotak align-content-center my-card-red k-1">
                                    <div class="row gx-0">
                                        <div class="col-6">
                                            <span class="fs-3 ms-2 item-icon"><i class="fa-solid fa-display"></i></span>

                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-white">{{ $monitorTidakAda }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="kotak align-content-center my-card-red k-2">
                                    <div class="row gx-0">
                                        <div class="col-6">
                                            <span class="fs-3 ms-2 item-icon"><i class="fa-solid fa-keyboard"></i></span>

                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-white">{{ $keyboardTidakAda }}</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6 ">
                                <div class="kotak align-content-center my-card-red k-3">
                                    <div class="row gx-0">
                                        <div class="col-6">
                                            <span class="fs-3 ms-2 item-icon"><i class="fa-solid fa-computer-mouse"></i></span>

                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-white">{{ $mouseTidakAda }}</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6 ">
                                <div class="kotak align-content-center my-card-red k-4">
                                    <div class="row gx-0">
                                        <div class="col-6">
                                            <span class="fs-3 ms-2 item-icon"><i class="fa-solid fa-mobile"></i></span>

                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-white">{{ $pcTidakAda }}</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="row justify-content-center">
        @foreach ($pcs as $pc)
            @php
                // Cek apakah ada detail laporan untuk PC ini
                $detail = $detailLaporanLabs->firstWhere('pc_id', $pc->id);

            @endphp
            <!-- Simulating 6 PC boxes -->
            <div class="col-12 col-sm-6 col-md-5 mb-4 ">
                <div class="pc-box bg-white p-3 rounded shadow position-relative {{ !$detail ? '' : ' incomplete' }}">
                    <div class="d-flex flex-column flex-sm-row align-items-stretch">
                        <div
                            class="bg-warning text-white d-flex justify-content-center align-items-center rounded p-2 flex-shrink-0 mb-2 mb-sm-0 col-12 col-sm-4">
                            <strong>{{ $pc->name }}</strong>
                        </div>
                        <div class="flex-grow-1 pl-sm-2 d-flex justify-content-center">
                            <div class="details d-flex flex-wrap justify-content-center">
                                <div
                                    class="mb-1 pc-detail {{ $detail && !$detail->has_monitor ? 'no-item' : 'has-item' }} p-1 rounded icon-box">
                                    <span class="item-icon"><i class="fa-solid fa-display"></i></span>
                                </div>
                                <div
                                    class="mb-1 pc-detail {{ $detail && !$detail->has_keyboard ? 'no-item' : 'has-item' }} p-1 rounded icon-box">
                                    <span class="item-icon"><i class="fa-solid fa-keyboard"></i></span>
                                </div>
                                <div
                                    class="mb-1 pc-detail {{ $detail && !$detail->has_mouse ? 'no-item' : 'has-item' }} p-1 rounded icon-box">
                                    <span class="item-icon"><i class="fa-solid fa-computer-mouse"></i></span>
                                </div>
                                <div
                                    class="mb-1 pc-detail {{ $detail && !$detail->has_pc ? 'no-item' : 'has-item' }} p-1 rounded icon-box">
                                    <span class="item-icon"><i class="fa-solid fa-mobile"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</x-layout-admin>
