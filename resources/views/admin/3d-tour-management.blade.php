<x-dashboard-layout>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Marker Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Marker Management</li>
        </ol>
        
        <!-- <a href="" class="btn btn-primary mb-2"">Add New Marker</a> -->
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                    <th scope="col">Latitude</th>
                    <th scope="col">Logitude</th>
                    <th scope="col">Link</th>
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
                    <td>{{ $marker->latitude }}</td>
                    <td>{{ $marker->longitude }}</td>
                    <td>{{ $marker->link }}</td>
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
<!-- addMarkerModal -->
    <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Marker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{route(createMarker)}}" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Tempat</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Kategori</option>
                    
                    @foreach ($categories as $data )
                        
                    <option value="">{{$data->catName}}</option>
                    @endforeach


                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Latitude</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Longitude</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Link</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
