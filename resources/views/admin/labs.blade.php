<x-layout-admin>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('labs.store') }}" method="POST">
                        @csrf
                        <!-- Nama Lab -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lab</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama Lab" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row justify-content-between">
                        <div class="col-md-4 text-md-start text-center">
                            <h6>Daftar Lab</h6>
                            <!-- Button trigger modal -->



                        </div>
                        <div class="col-md-3">
                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    + Tambah Lab
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
                                        Nama Lab
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Digunakan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jaringan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pengguna</th>
                                    <th class="text-center text-secondary opacity-7">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($labs as $lab)
                                    <tr>
                                        <td>
                                            <p class="text-xs text-secondary mb-0 text-center">{{ $loop->iteration }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $lab->name }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="badge {{ $lab->status ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">
                                                {!! $lab->status ? '<i class="fa-solid fa-check fa-lg"></i>' : '<i class="fa-solid fa-xmark fa-lg"></i>' !!}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="badge {{ $lab->status ? ($lab->used ? 'bg-gradient-success' : 'bg-gradient-danger') : 'bg-gradient-secondary' }}">
                                                {!! $lab->used ? '<i class="fa-solid fa-user fa-lg"></i>' : '<i class="fa-solid fa-user-slash fa-lg"></i>' !!}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="badge {{ $lab->status ? ($lab->network ? 'bg-gradient-success' : 'bg-gradient-danger') : 'bg-gradient-secondary' }}">
                                                {!! $lab->network ? '<i class="fa-solid fa-wifi fa-lg"></i>' : '<i class="fa-solid fa-xmark fa-lg"></i>' !!}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ $lab->user == null ? 'tidak digunakan' : $lab->user->class }}
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="row gx-0">
                                                <div class="col-md-4">
                                                    <form action="/change/lab/{{ $lab->id }}" method="post" class="changeForm"> 
                                                        @csrf
                                                        @method('put')
                                                        <div class="position-relative">
                                                            <div class="mb-1 pc-detail p-1 rounded icon-box position-relative {{ $lab->status ? 'bg-gradient-secondary' : 'bg-gradient-success' }}"
                                                                id="status-{{ $lab->id }}">
                                                                <span class="item-icon">{!! $lab->status
                                                                    ? '<i class="fa-solid fa-eye-slash text-white fa-xs"></i>'
                                                                    : '<i class="fa-solid fa-eye text-white fa-xs"></i>' !!}</span>
                                                                <input type="submit" value=""
                                                                    class="form-check-input status-toggle  position-absolute cbx ">
                                                            </div>
        
                                                        </div>
                                                    </form>
                                                </div>
                                                {{-- edit --}}
                                                <div class="col-md-4">
                                                    <a class="mb-1 pc-detail p-1 rounded icon-box bg-gradient-success text-white" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit-{{ $lab->id }}" >
                                                        <i class="fa-solid fa-pen"></i></a>
                                                </div>

                                                {{-- hapus --}}
                                                <div class="col-md-4">
                                                        <form action="{{ route('labs.destroy', $lab->id) }}" method="POST" style="display:inline;" class="deleteForm">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="mb-1 pc-detail p-1 rounded icon-box bg-gradient-danger text-white" style="border: 0px">
                                                                <i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                </div>
                                                {{-- moal edit --}}
                                                <!-- Modal -->
                                            </div>
                                            <div class="modal fade" id="modalEdit-{{ $lab->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Lab
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('labs.update', $lab->id) }}" method="POST" class="updateForm"> 
                                                                @csrf
                                                                @method('put')
                                                                <!-- Nama Lab -->
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Nama
                                                                        Lab</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="name"
                                                                        placeholder="Nama Lab" required value="{{$lab->name}}">
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout-admin>
