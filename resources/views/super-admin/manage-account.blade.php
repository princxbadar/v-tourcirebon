<x-dashboard-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manajemen Akun</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Manajemen Akun</li>
            </ol>

            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#insertUserModal">
                Daftarkan Akun
            </button>
            @include('components.success-message')
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">User Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @forelse ($user as $data)
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td>{{ $data->name}}</td>
                                    <td>{{ $data->email}}</td>
                                    <td>{{ $data->role}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser-{{$data->id}}">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- Insert Modal -->
    <div class="modal fade modal-xl" id="insertUserModal" tabindex="-1" aria-labelledby="insertUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertUserModalLabel">Pendaftaran Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('manage.create-user') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" name class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" >
                        </div>
                        <div class="mb-3">
                            <label for="email" name class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" >
                        </div>
                        <div class="mb-3">
                            <label for="password" name class="form-label">Password</label>
                            <input type="password" name="password" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" >
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" name class="form-label">Password Confirmation</label>
                            <input type="password" name="password_confirmation" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" value="{{ old('password') }}" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($user as $data)
        <div class="modal fade modal-xl" id="deleteUser-{{$data->id}}" tabindex="-1" aria-labelledby="deleteUser-Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUser-Label">Hapus Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manage.delete-user', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p class="text-gray-900">
                                Apakah anda yakin ingin menghapus akun untuk <b>{{ $data->name }}</b>?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-dashboard-layout>
