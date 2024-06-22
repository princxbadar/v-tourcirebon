<x-dashboard-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>


            <div>
                <!-- Peta Leaflet -->
                <div id="map" style="width: 800px; height: 400px;"></div>
                    <script>
                        var map = L.map('map').setView([-6.706117145755258, 108.55783199712985], 13);

                        var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);
                    </script>
            </div>
        </div>
    </main>
</x-dashboard-layout>
