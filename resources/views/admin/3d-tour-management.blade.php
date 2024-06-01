<x-dashboard-layout>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Marker Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Marker Management</li>
        </ol>
        
        <!-- <a href="" class="btn btn-primary mb-2"">Add New Marker</a> -->
        <x-add-marker-modal></x-add-marker-modal>

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
                    <td>{{ $marker->category }}</td>
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
            {{ $markers->links() }}
            </div>
        </div>
    </div>
</main>
</x-dashboard-layout>
