<x-layout-admin>

    <!-- Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User and Roles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form id="userForm" action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <!-- Input Nama User -->
                        <div class="form-group mb-3">
                            <label for="user_name">Name</label>
                            <input type="text" name="name" id="user_name" class="form-control" required>
                        </div>

                        <!-- Input Email -->
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <!-- Input Role -->
                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Submit Button -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="userForm" class="btn btn-primary">Save User</button>
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
                            <h6>User List</h6>
                        </div>
                        <div class="col-md-3">
                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal">
                                    + Add User
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
                                        Name
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Role</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <p class="text-xs text-secondary mb-0 text-center">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $user->class }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">{{ $user->email }}</td>
                                        <td class="align-middle text-center text-sm">{{ ucfirst($user->role) }}</td>

                                        <td class="align-middle">
                                            <div class="row gx-0">
                                                <!-- Edit -->
                                                <div class="col-md-4">
                                                    <a class="mb-1 pc-detail p-1 rounded icon-box bg-gradient-success text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editUserModal{{ $user->id }}">
                                                        <i class="fa-solid fa-pen"></i></a>
                                                </div>

                                                <!-- Delete -->
                                                <div class="col-md-4">
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                        method="POST" style="display:inline;" class="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="mb-1 pc-detail p-1 rounded icon-box bg-gradient-danger text-white"
                                                            style="border: 0px">
                                                            <i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit User -->
                                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="editUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form Edit User -->
                                                    <form action="{{ route('users.update', $user->id) }}"
                                                        method="POST" class="updateForm">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Input Name -->
                                                        <div class="form-group mb-3">
                                                            <label for="user_name">Name</label>
                                                            <input type="text" name="name" id="user_name"
                                                                class="form-control" value="{{ $user->class }}"
                                                                required>
                                                        </div>

                                                        <!-- Input Email -->
                                                        <div class="form-group mb-3">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" id="email"
                                                                class="form-control" value="{{ $user->email }}"
                                                                required>
                                                        </div>

                                                        <!-- Input Email -->
                                                        <div class="form-group mb-3">
                                                            <label for="password">Password</label>
                                                            <input type="password" name="password" id="password"
                                                                class="form-control" value=""
                                                                >
                                                        </div>

                                                        <!-- Input Role -->
                                                        <div class="form-group mb-3">
                                                            <label for="role">Role</label>
                                                            <select name="role" id="role" class="form-control">
                                                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                            </select>
                                                        </div>

                                                        <!-- Submit -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                User</button>
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
</x-layout-admin>
