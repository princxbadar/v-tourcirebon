<x-dashboard-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Peta koordinat dan daftar objek pariwisata</li>
            </ol>


            <div class="mb-4">
                <!-- Peta Leaflet -->
                <div id="map" style="width: 100%; height: 400px;"></div>
                <script>
                    var map = L.map('map').setView([-6.706117145755258, 108.55783199712985], 13);

                    var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                </script>
            </div>
            <h1 class="text-gray-900">
                Daftar Objek Pariwisata
            </h1>
            <div class="card mb-4">
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Tempat</th>
                                <th>Alamat</th>
                                <th>Kategori</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @forelse ($markers as $marker)
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td>{{ $marker->tempat}}</td>
                                <td>{{ $marker->address}}</td>
                                <td>{{ $marker->catName }}</td>
                                <td>{{ $marker->latitude }}</td>
                                <td>{{ $marker->longitude }}</td>
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
</x-dashboard-layout>
