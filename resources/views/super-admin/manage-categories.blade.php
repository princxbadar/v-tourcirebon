<x-dashboard-layout>
<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manajemen Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ubah, Tambah, dan Hapus kategori</li>
            </ol>

            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#insertCategoriesModal">
                Tambahkan Kategori
            </button>


            @include('components.success-message')
            <div class="card mb-4">
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Kategori</th>
                            <th scope="col">Nama</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @forelse ($categories as $data)
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td>{{ $data->id}}</td>
                            <td>{{ $data->catName}}</td>
                            <td>
                                <div class="d-flex justify-content-end align-items-center">
                                    <button class="btn btn-primary btn-rounded me-2" data-bs-toggle="modal" data-bs-target="#updateCoord-{{ $data->id }}">Ubah</button>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCat-{{ $data->id }}">Hapus</button>
                                </div>
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
    <div class="modal fade modal-xl" id="insertCategoriesModal" tabindex="-1" aria-labelledby="insertCategoriesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertCategoriesModalLabel">Buat Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.create-categories')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="catName" name class="form-label">Nama Kategori</label>
                    <input type="text" name="catName" class="form-control @error('catName') is-invalid @enderror" id="catName" value="{{ old('catName') }}" >
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Buat</button>
            </form>
            </div>
            </div>
        </div>
    </div>
    <!-- Update Modal -->
    @foreach ($categories as $data)
        <div class="modal fade modal-xl" id="updateCoord-{{ $data->id }}" tabindex="-1" aria-labelledby="updateCoord" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCoorModalLabel">Ubah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{route('admin.update-categories', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="catName" name class="form-label">Nama Kategori</label>
                        <input type="text" name="catName" class="form-control @error('catName') is-invalid @enderror" id="catName" value="{{ $data->catName }}" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-xl" id="deleteCat-{{ $data->id }}" tabindex="-1" aria-labelledby="deleteCat" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateCoorModalLabel">Hapus Kategori</h5>
                    </div>
                    <form action="{{ route('admin.delete-categories', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p class="text-gray-900">
                                Apakah anda yakin ingin menghapus kategori <b>{{ $data->catName }}</b>?
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
