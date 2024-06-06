<x-dashboard-layout>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Marker Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Marker Management</li>
        </ol>

        <!-- <a href="" class="btn btn-primary mb-2"">Add New Marker</a> -->
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#insertMarkerModal">
        Add New Coordinate
        </button>


        <div class="card mb-4">
            <div class="card-body">
            <form action="{{route('admin.create-marker')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="tempat" name class="form-label">Nama Tempat</label>
                    <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" id="tempat" value="{{ old('tempat') }}" >
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>
                
                    <!-- error message untuk Keterangan -->
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

                    <option value="{{$data->id}}">{{$data->catName}}</option>
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
                    <label for="link" name class="form-label">Link</label>
                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="link" value="{{ old('link') }}" >
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
                </form>
            </div>
        </div>
    </div>
</main>
</x-dashboard-layout>