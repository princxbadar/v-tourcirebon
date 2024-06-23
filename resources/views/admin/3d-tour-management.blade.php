<x-dashboard-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manajemen Marker</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambah, Ubah, dan Hapus Marker</li>
            </ol>

            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#insertMarkerModal">
                Tambahkan Koordinat
            </button>


            <div class="card mb-4">
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Tempat</th>
                                <th>Alamat</th>
                                <th>Keterangan</th>
                                <th>Kategori</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Image</th>
                                <th>Harga</th>
                                <th>Youtube Link</th>
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
                                <td>{{ $marker->address}}</td>
                                <td>{{ $marker->keterangan }}</td>
                                <td>{{ $marker->catName }}</td>
                                <td>{{ $marker->latitude }}</td>
                                <td>{{ $marker->longitude }}</td>
                                <td>{{ $marker->image }}</td>
                                <td>{{ "Rp " . number_format($marker->price_start,2,',','.') }}</td>
                                <td>{{ $marker->youtube_link }}</td>
                                <td>{{ $marker->navlink }}</td>
                                <td>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#detailModal{{$marker->id}}">Ubah</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalCoord{{$marker->id}}">Hapus</button>
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

    <div class="modal fade modal-xl" id="insertMarkerModal" tabindex="-1" aria-labelledby="insertMarkerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertMarkerModalLabel">Tambah Koordinat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.create-marker')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="tempat" name class="form-label">Nama Tempat</label>
                        <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" id="tempat" value="{{ old('tempat') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="address" name class="form-label">Alamat</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address') }}" >
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
                        <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude" value="{{ old('latitude') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="longitude" name class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude" value="{{ old('longitude') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="price_start" name class="form-label">Start Harga</label>
                        <input type="number" name="price_start" class="form-control @error('price_start') is-invalid @enderror" id="price_start" value="{{ old('price_start') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="price_end" name class="form-label">End Harga</label>
                        <input type="number" name="price_end" class="form-control @error('price_end') is-invalid @enderror" id="price_end" value="{{ old('price_end') }}" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                        <!-- error message untuk image -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Youtube Link</label>
                        <textarea class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" rows="5" placeholder="Masukkan Link">{{ old('youtube_link') }}</textarea>

                        @error('description')
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Buat</button>
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
                        <h5 class="modal-title" id="detailModalLabel">Ubah Koordinat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <form action="{{route('admin.update-marker', ['id' => $marker->id])}}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="tempat" name class="form-label">Nama Tempat</label>
                                <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" id="tempat" value="{{ $marker->tempat }}" >
                            </div>
                            <div class="mb-3">
                                <label for="address" name class="form-label">Alamat</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ $marker->address }}" >
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{$marker->keterangan}}</textarea>

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
                                <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude" value="{{ $marker->latitude }}" >
                            </div>
                            <div class="mb-3">
                                <label for="longitude" name class="form-label">Longitude</label>
                                <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude" value="{{ $marker->longitude }}" >
                            </div>
                            <div class="mb-3">
                                <label for="price_start" name class="form-label">Start Harga</label>
                                <input type="number" name="price_start" class="form-control @error('price_start') is-invalid @enderror" id="price_start" value="{{ $marker->price_start }}" >
                            </div>
                            <div class="mb-3">
                                <label for="price_end" name class="form-label">End Harga</label>
                                <input type="number" name="price_end" class="form-control @error('price_end') is-invalid @enderror" id="price_end" value="{{ $marker->price_end }}" >
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                <!-- error message untuk image -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Youtube Link</label>
                                <textarea class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" rows="5" placeholder="Masukkan Link Youtube">{{ $marker->youtube_link }}</textarea>

                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Link</label>
                                <textarea class="form-control @error('link') is-invalid @enderror" name="link" rows="5" placeholder="Masukkan Link">{{ $marker->link }}</textarea>

                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nav-Link</label>
                                <textarea class="form-control @error('navlink') is-invalid @enderror" name="navlink" rows="5" placeholder="Masukkan Nav-Link">{{$marker->navlink}}</textarea>

                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
        <div class="modal fade modal-xl" id="deleteModalCoord{{$marker->id}}" tabindex="-1" aria-labelledby="deleteModalCoordLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalCoordLabel">Hapus Koordinat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.delete-marker', $marker->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p class="text-gray-900">
                                Apakah anda yakin ingin menghapus koordinat untuk <b>{{ $marker->tempat }}</b>?
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
