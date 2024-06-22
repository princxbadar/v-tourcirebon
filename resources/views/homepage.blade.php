<x-layout>
    <section class="bg-image">
        <div class="row text-center">
            <div class="col">
                <h1 class="mb-4 pt-4">Virtual Tour: Cirebon</h1>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center mx-5">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h4 class="text-gray-900">
                        Objek Pariwisata
                    </h4>
                    <div class="row g-3">
                        @foreach ($markers as $mrkr)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <a href="{{route('detail', $mrkr->id)}}" >
                                        <img src="{{ asset('storage/thumbnail/' . $mrkr->image) }}" class="card-img-top" alt="Project1">
                                    </a>

                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{$mrkr->tempat}}</h5>
                                    </div>

                                    <div class="card-footer text-body-secondary text-center">Lihat lebih lengkap</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h4 class="text-gray-900">
                        Peta Cirebon
                    </h4>
                    <div class="d-flex justify-content-center align-items-center">
                        <!-- Peta Leaflet -->
                        <div id="map" style="height: 50vh; width: 75vw"></div>
                        <script>
                            var map = L.map('map').setView([-6.706117145755258, 108.55783199712985], 13);

                            var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
