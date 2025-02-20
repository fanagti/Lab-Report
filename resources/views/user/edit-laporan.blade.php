<x-layout-user>

    <form action="{{ url('/pcs/update/' . $labId) }}" method="POST" class="submitForm">
        @csrf
        @method('PUT')

        <div class="card p-4 mt-4 mb-3 shadow">
            <div class="row">
                <div class="col-12 mb-3">
                    <h5 class="fw-bold"><i class="fa-solid fa-building text-dark fs-4"></i> {{ $lab->name }}</h5>
                </div>
                <div class="col-2 d-flex align-items-center  mb-3">
                    <i class="fas fa-network-wired text-blue icon mr-2 me-2"></i>
                    <span id="network-status ml-2">Network:</span>
                </div>
                <div class="col-md-4 d-flex align-items-center ">
                    <select id="network-select" class="form-select me-2" name="network">
                        <option value="1">Connected</option>
                        <option value="0">Disconnected</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card p-4 mt-4 mb-3 shadow">
            <div class="row">
                <div class="col-3">
                    <div class="row">

                            <div class="mb-1 pc-detail p-1 rounded icon-box  has-item" id="monitor-">
                            <span class="item-icon"><i class="fa-brands fa-hashnode"></i></span>

                        </div>
                        <div class="col-6"><h6>Cick Icon</h6></div>
                    </div>


                </div>
                <div class="col-3">
                    <div class="row">

                            <div class="mb-1 pc-detail p-1 rounded icon-box  has-item" id="monitor-">
                            <span class="item-icon"><i class="fa-brands fa-hashnode"></i></span>

                        </div>
                        <div class="col-6"><h6>Ada</h6></div>
                    </div>


                </div>
                <div class="col-3">
                    <div class="row">

                            <div class="mb-1 pc-detail p-1 rounded icon-box  no-item" id="monitor-">
                            <span class="item-icon"><i class="fa-brands fa-hashnode"></i></span>

                        </div>
                        <div class="col-6"><h6>Tidak Ada</h6></div>
                    </div>


                </div>

            </div>

        </div>

        <div class="row">
            @foreach ($lab->pcs as $pc)
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <div class="pc-box bg-white p-3 rounded shadow position-relative">
                        <div class="d-flex flex-column flex-sm-row align-items-stretch">
                            <div
                                class="bg-warning text-white d-flex justify-content-center align-items-center rounded p-2 flex-shrink-0 mb-2 mb-sm-0 col-12 col-sm-5">
                                <strong>{{ $pc->name }}</strong>
                            </div>

                            <div class="flex-grow-1 pl-sm-2 d-flex justify-content-center">
                                <div class="details d-flex flex-wrap justify-content-center ">
                                    <div class="position-relative">
                                        <div class="mb-1 pc-detail p-1 rounded icon-box position-relative {{ $pc->has_monitor ? 'has-item' : 'no-item' }}"
                                            id="monitor-{{ $pc->id }}">
                                            <span class="item-icon"><i class="fa-solid fa-display"></i></span>
                                            <input type="checkbox" name="pcs[{{ $pc->id }}][has_monitor]"
                                                {{ $pc->has_monitor ? 'checked' : '' }}
                                                class="form-check-input status-toggle  position-absolute cbx "
                                                data-target="monitor-{{ $pc->id }}">
                                        </div>
                                        <div class="tooltip">monitor</div>
                                    </div>
                                    <div class="position-relative">
                                        <div class="mb-1 pc-detail p-1 rounded icon-box position-relative {{ $pc->has_keyboard ? 'has-item' : 'no-item' }}"
                                            id="keyboard-{{ $pc->id }}">
                                            <span class="item-icon"><i class="fa-solid fa-keyboard"></i></span>
                                            <input type="checkbox" name="pcs[{{ $pc->id }}][has_keyboard]"
                                                {{ $pc->has_keyboard ? 'checked' : '' }}
                                                class="form-check-input status-toggle  position-absolute cbx "
                                                data-target="keyboard-{{ $pc->id }}">
                                        </div>
                                        <div class="tooltip">keyboard</div>
                                    </div>
                                    <div class="position-relative">
                                        <div class="mb-1 pc-detail p-1 rounded icon-box position-relative {{ $pc->has_mouse ? 'has-item' : 'no-item' }}"
                                            id="mouse-{{ $pc->id }}">
                                            <span class="item-icon"><i class="fa-solid fa-computer-mouse"></i></span>
                                            <input type="checkbox" name="pcs[{{ $pc->id }}][has_mouse]"
                                                {{ $pc->has_mouse ? 'checked' : '' }}
                                                class="form-check-input status-toggle  position-absolute cbx "
                                                data-target="mouse-{{ $pc->id }}">
                                        </div>
                                        <div class="tooltip">mouse</div>
                                    </div>
                                    <div class="position-relative">
                                        <div class="mb-1 pc-detail p-1 rounded icon-box position-relative {{ $pc->has_pc ? 'has-item' : 'no-item' }}"
                                            id="pc-{{ $pc->id }}">
                                            <span class="item-icon"><i class="fa-solid fa-mobile"></i></span>
                                            {{-- //bug clean--------- --}}
                                            <input type="checkbox" name="pcs[{{ $pc->id }}][nb]"
                                                {{ $pc->has_pc ? 'checked' : '' }}
                                                class="form-check-input status-toggle  position-absolute cbx "
                                                data-target="pc-{{ $pc->id }}">
                                            {{-- ----------------------- --}}
                                            <input type="checkbox" name="pcs[{{ $pc->id }}][has_pc]"
                                                {{ $pc->has_pc ? 'checked' : '' }}
                                                class="form-check-input status-toggle  position-absolute cbx "
                                                data-target="pc-{{ $pc->id }}">

                                        </div>
                                        <div class="tooltip">pc</div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-8 text-center">
                {{-- <button type="submit" class="btn btn-primary mb-3">Kirim</button> --}}
                <button type="submit" class="btn btn-custom fw-bold "><i class="fas fa-paper-plane mr-2"></i> Kirim
                    Laporan</button>

            </div>
        </div>
    </form>


</x-layout-user>
