<x-dashboard-layout>
<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Account Management</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Account Management</li>
            </ol>

            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#insertUserModal">
            Register User
            </button>


            <div class="card mb-4">
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">User Role</th>
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
                               <a href="" class="badge rounded-pill text-bg-danger" data-toggle="modal" data-target="">Delete</a>
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
                <h5 class="modal-title" id="insertUserModalLabel">Create Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('manage.create-user') }}">
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
            </form>
            </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>