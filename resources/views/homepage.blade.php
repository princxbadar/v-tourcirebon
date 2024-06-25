<x-layout>
    <div class="text-center">
        <h1 class="mb-4 pt-4">Virtual Tour: Cirebon</h1>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="row g-5">
                    <div class="col-12">
                        <div class="text-center">
                            <h4 class="text-gray-900">
                                Peta Cirebon
                            </h4>
                            <p><small>Cari objek wisata pilihan melalui peta dibawah ini, pilih dan klik keterangan</small></p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Peta Leaflet -->
                            <div id="map" style="min-height: 65vh; width: 75vw"></div>
                            <script>
                                var map = L.map('map').setView([-6.706117145755258, 108.55783199712985], 13);
                                var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                }).addTo(map);

                                // Setting Marker
                                @foreach ($markers as $marker)
                                    L.marker([{{ $marker->latitude }}, {{ $marker->longitude }}])
                                    .bindPopup('<a href="{{route('detail', $marker->id)}}" class="text-decoration-none"><h2>{{ $marker->tempat }}</h2></a>').addTo(map);
                                @endforeach
                            </script>
                        </div>
                    </div>
                    {{-- Divider --}}
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <h4 class="text-gray-900">
                                Objek Pariwisata
                            </h4>
                            <p><small>Temukan banyak keindahan pariwisata cirebon yang telah kami sajikan dibawah ini</small></p>
                        </div>
                        <div class="row g-3">
                            @foreach ($markers as $mrkr)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <a class="text-decoration-none text-gray-900" href="{{route('detail', $mrkr->id)}}" >
                                        <div class="card w-100">
                                            <img src="{{ asset('storage/thumbnail/' . $mrkr->image) }}" class="card-img-top" alt="Project1">

                                            <div class="card-body">
                                                <h5 class="card-title text-center">{{$mrkr->tempat}}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
