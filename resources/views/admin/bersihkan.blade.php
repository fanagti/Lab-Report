<x-layout-admin>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-4 text-md-start text-center">
                          @if ($laporanLabs == null)
                                   
                                @else
                               
                               
                            <form action="{{ route('laporan-labs.delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="date" value="{{ $todayForm }}">

                                <button type="submit" class="btn btn-danger">Hapus semua</button>
                            </form>
                            @endif
                        </div>
                        <div class="col-md-4 text-md-start text-center">
                          @if ($laporanLabs == null)
                              <h6>silahkan masukan tanggal</h6>
                          @else
                          <h6>Laporan Sebelum {{ $today }}</h6>
                              
                          @endif
                        </div>
                        <div class="col-md-4">
                            <div class="row justify-content-end g-1">
                                <div class="col-md-8 col-10">

                                    <form method="GET" action="{{ url('/bersihkan') }}">
                                        {{-- <input type="date" name="tanggal" value="{{ request('tanggal', \Carbon\Carbon::today()->toDateString()) }}"> --}}
                                        {{-- @dd($todayForm) --}}
                                        <input type="date" class="form-control" placeholder="date" name="date"
                                            value="{{ $todayForm }}">

                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa-solid fa-magnifying-glass-arrow-right fs-6"></i></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                        no</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        lab</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jam Mulai</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jam Selesai</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        GURU</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        MAPEL</th>
                                    <th class="text-secondary opacity-7">menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($laporanLabs) --}}
                                @if ($laporanLabs == null)
                                    <td colspan="7" class="text-center">
                                        <p>Laporan tidak ada</p>
                                    </td>
                                @else
                                    @foreach ($laporanLabs as $laporan)
                                        <tr>
                                            <td>
                                                <p class="text-xs text-secondary mb-0 text-center">
                                                    {{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $laporan->lab->name }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ \Carbon\Carbon::parse($laporan->jam_mulai)->format('H:i') }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-danger">{{ \Carbon\Carbon::parse($laporan->jam_selesai)->format('H:i') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $laporan->guru->name }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $laporan->mapel->name }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="btn btn-link text-info text-gradient px-3 mb-0"
                                                    href="{{ route('laporan.detail', $laporan->id) }}"></i>Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout-admin>
