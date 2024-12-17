<x-layout-admin>


    <!-- Modal -->
    <div class="modal fade" id="addGuruModal" tabindex="-1" aria-labelledby="addGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGuruModalLabel">Add Guru and Mapels</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form id="guruForm" action="{{ route('gurus.storeWithMapels') }}" method="POST">
                        @csrf

                        <!-- Input Nama Guru -->
                        <div class="form-group mb-3">
                            <label for="guru_name">Nama Guru</label>
                            <input type="text" name="guru_name" id="guru_name" class="form-control" required>
                        </div>

                        <!-- Input Mapel -->
                        <div class="form-group mb-3">
                            <label for="mapels">Mapels</label>
                            <div id="mapels-container">
                                <div class="row g-1 mb-2">
                                    <div class="col-10 col-md-11">
                                        <input type="text" name="mapels[]" class="form-control" required>
                                    </div>
                                    <div class="col-2 col-md-1">
                                        <button type="button" class="btn btn-success add-mapel">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Submit Button -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="guruForm" class="btn btn-primary">Save Guru and Mapels</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row justify-content-between">
                        <div class="col-md-4 text-md-start text-center">
                            <h6>Daftar Guru</h6>
                            <!-- Button trigger modal -->

                        </div>
                        <div class="col-md-3">
                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#addGuruModal">
                                    + Tambah Guru
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                        No
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Guru
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mapel</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gurus as $guru)
                                    <tr>
                                        <td>
                                            <p class="text-xs text-secondary mb-0 text-center">{{ $loop->iteration }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $guru->name }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            
                                                @foreach ($guru->mapels as $mapel)
                                                    {{ ' - '.$mapel->name }}
                                                @endforeach
                                            
                                        </td>

                                        <td class="align-middle">
                                            <div class="row gx-0">

                                                {{-- edit --}}
                                                <div class="col-md-4">
                                                    <a class="mb-1 pc-detail p-1 rounded icon-box bg-gradient-success text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editGuruModal{{ $guru->id }}">
                                                        <i class="fa-solid fa-pen"></i></a>
                                                </div>

                                                {{-- hapus --}}
                                                <div class="col-md-4">
                                                    <form action="{{ route('gurus.destroy', $guru->id) }}"
                                                        method="POST" style="display:inline;" class="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="mb-1 pc-detail p-1 rounded icon-box bg-gradient-danger text-white"
                                                            style="border: 0px">
                                                            <i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </div>
                                                {{-- moal edit --}}
                                                <!-- Modal -->
                                            </div>
                                        </td>


                                    </tr>

                                    <!-- Modal Edit Guru -->
                                    <div class="modal fade" id="editGuruModal{{ $guru->id }}" tabindex="-1"
                                        aria-labelledby="editGuruModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editGuruModalLabel">Edit Guru</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form Edit Guru -->
                                                    <form action="{{ route('gurus.update', $guru->id) }}"
                                                        method="POST" class="updateForm">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Input Nama Guru -->
                                                        <div class="form-group mb-3">
                                                            <label for="guru_name">Nama Guru</label>
                                                            <input type="text" name="guru_name" id="guru_name"
                                                                class="form-control" value="{{ $guru->name }}"
                                                                required>
                                                        </div>

                                                        <!-- Input Mapel -->
                                                        <div class="form-group mb-3">
                                                            <label for="mapels">Mapels</label>
                                                            <div id="mapels-container-{{ $guru->id }}">
                                                                @foreach ($guru->mapels as $mapel)
                                                                    <div class="input-group mb-2">
                                                                        <input type="text" name="mapels[]"
                                                                            class="form-control"
                                                                            value="{{ $mapel->name }}" required>
                                                                        <button type="button"
                                                                            class="btn btn-danger remove-mapel">-</button>
                                                                    </div>
                                                                @endforeach
                                                                <div class="input-group mb-2">
                                                                    <input type="text" name="mapels[]"
                                                                        class="form-control"
                                                                        placeholder="Enter Mapel Name">
                                                                    <button type="button"
                                                                        class="btn btn-success add-mapel">+</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Submit -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Guru</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to Add/Remove Mapel Fields -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('add-mapel')) {
                    const container = event.target.closest('.form-group').querySelector('.input-group')
                        .parentNode;
                    const newField = document.createElement('div');
                    newField.className = 'input-group mb-2';
                    newField.innerHTML = `
                    <input type="text" name="mapels[]" class="form-control" placeholder="Enter Mapel Name">
                    <button type="button" class="btn btn-danger remove-mapel">-</button>
                `;
                    container.appendChild(newField);
                }

                if (event.target.classList.contains('remove-mapel')) {
                    event.target.closest('.input-group').remove();
                }
            });
        });
    </script>
    <!-- Script to Add/Remove Mapel Fields -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mapelsContainer = document.getElementById('mapels-container');

            // Add new Mapel field
            document.querySelector('.add-mapel').addEventListener('click', function() {
                const newField = document.createElement('div');
                newField.innerHTML = `
                    <div class="row g-1 mb-2">
                        <div class="col-10 col-md-11">
                            <input type="text" name="mapels[]" class="form-control" required>
                        </div>
                        <div class="col-2 col-md-1">
                            <button type="button" class="btn btn-danger remove-mapel">-</button>
                        </div>
                    </div>
                `;
                mapelsContainer.appendChild(newField);

                // Add remove functionality to the new button
                newField.querySelector('.remove-mapel').addEventListener('click', function() {
                    newField.remove();
                });
            });

            // Remove existing Mapel field
            mapelsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-mapel')) {
                    event.target.parentElement.remove();
                }
            });
        });
    </script>

</x-layout-admin>
