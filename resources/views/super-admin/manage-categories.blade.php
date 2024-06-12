<x-dashboard-layout>
<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Categories Management</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Categories Management</li>
            </ol>

            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#insertCategoriesModal">
            Add New Categories
            </button>


            <div class="card mb-4">
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categories ID</th>
                        <th scope="col">Categories Name</th>
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
                                <a href="" class="badge rounded-pill text-bg-primary" data-toggle="modal" data-target="#updateCoorModal">Update</a>
                                <a href="" class="badge rounded-pill text-bg-info" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</a>
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
    <div class="modal fade modal-xl" id="insertCategoriesModal" tabindex="-1" aria-labelledby="insertCategoriesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertCategoriesModalLabel">Create Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{route('manage.create-categories')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="catName" name class="form-label">Nama Kategori</label>
                    <input type="text" name="catName" class="form-control @error('catName') is-invalid @enderror" id="catName" value="{{ old('catName') }}" >
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