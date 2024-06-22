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
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Tempat</th>
                                <th>Keterangan</th>
                                <th>Kategori</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Image</th>
                                <th>Harga</th>
                                <th>Nav Link</th>
                                <th>Action</th>
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
                                <td>{{ $marker->latitude }}</td>
                                <td>{{ $marker->longitude }}</td>
                                <td>{{ $marker->image }}</td>
                                <td>{{ "Rp " . number_format($marker->price,2,',','.') }}</td>
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
                <form action="{{route('admin.create-marker')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
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
                        <label for="latitude" name class="form-label">Latitude</label>
                        <input type="number" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude" value="{{ old('latitude') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="longitude" name class="form-label">Longitude</label>
                        <input type="number" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude" value="{{ old('longitude') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="price" name class="form-label">Range Harga</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price') }}" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">IMAGE</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                        <!-- error message untuk image -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Link</label>
                        <textarea class="form-control @error('link') is-invalid @enderror" name="link" rows="5" placeholder="Masukkan Link">{{ old('link') }}</textarea>

                        @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Nav-Link</label>
                        <textarea class="form-control @error('navlink') is-invalid @enderror" name="navlink" rows="5" placeholder="Masukkan Nav-Link">{{ old('navlink') }}</textarea>

                        @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
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

    @foreach ($markers as $marker)
        <div class="modal fade modal-xl" id="detailModal{{$marker->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Create Marker</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <form action="{{route('admin.update-marker', $marker->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
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
                            <label for="image" name class="form-label">Image</label>
                            <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" id="image" value="{{ $marker->image }}" >
                        </div>
                        <div class="mb-3">
                            <label for="navlink" name class="form-label">Navigation Link</label>
                            <input type="text" name="navlink" class="form-control @error('navlink') is-invalid @enderror" id="navlink" value="{{ $marker->navlink }}" >
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

    @endforeach
</x-dashboard-layout>
