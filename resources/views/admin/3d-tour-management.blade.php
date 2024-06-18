<x-dashboard-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Marker Management</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Marker Management</li>
            </ol>

            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#insertMarkerModal">
            Add New Coordinate
            </button>


            <div class="card mb-4">
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Tempat</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Logitude</th>
                        <th scope="col">Link</th>
                        <th scope="col">Nav Link</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @forelse ($markers as $marker)
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td>{{ $marker->tempat}}</td>
                            <td>{{ $marker->keterangan }}</td>
                            <td>{{ $marker->catName }}</td>
                            <td>{{ "Rp " . number_format($marker->price,2,',','.') }}</td>
                            <td>{{ $marker->latitude }}</td>
                            <td>{{ $marker->longitude }}</td>
                            <td>{{ $marker->id }}</td>
                            <td>{{ $marker->navlink }}</td>
                            <td>
                                <a href="" class="badge rounded-pill text-bg-primary" data-toggle="modal" data-target="#updateCoorModal">Update</a>
                                <a href="" class="badge rounded-pill text-bg-info" data-bs-toggle="modal" data-bs-target="#detailModal{{$marker->id}}">Detail</a>
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
    <div class="modal fade modal-xl" id="insertMarkerModal" tabindex="-1" aria-labelledby="insertMarkerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertMarkerModalLabel">Create Marker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.create-marker')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="tempat" name class="form-label">Nama Tempat</label>
                    <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" id="tempat" value="{{ old('tempat') }}" >
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>

                    @error('description')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                <select name="categories_id" class="form-control @error('categories_id') is-invalid @enderror" aria-label="Default select example">
                    <option selected>Kategori</option>

                    @foreach ($categories as $data )

                    <option value="{{$data->id}}">{{ $data->catName  }}</option>
                    @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="price" name class="form-label">Range Harga</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price') }}" >
                </div>
                <div class="mb-3">
                    <label for="latitude" name class="form-label">Latitude</label>
                    <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude" value="{{ old('latitude') }}" >
                </div>
                <div class="mb-3">
                    <label for="longitude" name class="form-label">Longitude</label>
                    <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude" value="{{ old('longitude') }}" >
                </div>
                <div class="mb-3">
                    <label for="link" name class="form-label">Link</label>
                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="link" value="{{ old('link') }}" >
                </div>
                <div class="mb-3">
                    <label for="navlink" name class="form-label">Navigation Link</label>
                    <input type="text" name="navlink" class="form-control @error('navlink') is-invalid @enderror" id="navlink" value="{{ old('navlink') }}" >
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

    @foreach ($markers as $marker)
        <div class="modal fade modal-xl" id="detailModal{{$marker->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Create Marker</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                    <form action="{{route('admin.update-marker', $marker->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                     @method('patch')
                <div class="mb-3">
                    <label for="tempat" name class="form-label">Nama Tempat</label>
                    <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" id="tempat" value="{{ $marker->tempat }}" >
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{ $marker->keterangan }}</textarea>

                    @error('description')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                <select name="categories_id" class="form-control @error('categories_id') is-invalid @enderror" aria-label="Default select example">
                    <option selected>Kategori</option>

                    @foreach ($categories as $data )

                    <option value="{{$data->id}}">{{ $data->catName  }}</option>
                    @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="price" name class="form-label">Range Harga</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $marker->price }}" >
                </div>
                <div class="mb-3">
                    <label for="latitude" name class="form-label">Latitude</label>
                    <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude" value="{{ $marker->latitude }}" >
                </div>
                <div class="mb-3">
                    <label for="longitude" name class="form-label">Longitude</label>
                    <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude" value="{{ $marker->longitude }}" >
                </div>
                <div class="mb-3">
                    <label for="link" name class="form-label">Link</label>
                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="link" value="{{ $marker->link }}" >
                </div>
                <div class="mb-3">
                    <label for="navlink" name class="form-label">Navigation Link</label>
                    <input type="text" name="navlink" class="form-control @error('navlink') is-invalid @enderror" id="navlink" value="{{ $marker->navlink }}" >
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

    @endforeach
</x-dashboard-layout>