<x-layout>
    <div class="text-center">
        <h1 class="mb-4 pt-4">Virtual Tour: Cirebon</h1>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="row g-5">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="d-lg-block d-sm-none">
                                    <img src="{{ asset('/image/carousel-1.jpg') }}" alt="memek" class="img-fluid h-100 rounded-5">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="text-start">
                                    <h4>
                                        Jelajahi Pariwisata Kota Cirebon
                                    </h4>
                                    <p>
                                        Kota Cirebon adalah salah satu kota yang berada di provinsi Jawa Barat, Indonesia. Kota ini berada di pesisir utara Pulau Jawa yang menghubungkan Jakarta dengan Surabaya di lintas utara dan tengah Jawa. Pada pertengahan tahun 2023, jumlah penduduk kota Cirebon sebanyak 348.912 jiwa, dengan kepadatan 9.194 jiwa/km2.
                                        Pada awalnya Cirebon berasal dari kata sarumban, Cirebon adalah sebuah dukuh kecil yang dibangun oleh Ki Gedeng Tapa. Lama-kelamaan Cirebon berkembang menjadi sebuah desa yang ramai yang kemudian diberi nama Caruban (carub dalam bahasa Jawa artinya bersatu padu). Diberi nama demikian karena di sana bercampur para pendatang dari beraneka bangsa di antaranya Jawa, Sunda, Tionghoa, dan unsur-unsur budaya bangsa Arab), agama, bahasa, dan adat istiadat. kemudian pelafalan kata caruban berubah lagi menjadi carbon dan kemudian cirebon.
                                        Selain karena faktor penamaan tempat penyebutan kata cirebon juga dikarenakan sejak awal mata pencaharian sebagian besar masyarakat adalah nelayan, maka berkembanglah pekerjaan menangkap ikan dan rebon (udang kecil) di sepanjang pantai, serta pembuatan terasi, petis dan garam. Dari istilah air bekas pembuatan terasi yang terbuat dari sisa pengolahan udang rebon inilah berkembang sebutan cai-rebon (bahasa Sunda: air rebon), yang kemudian menjadi cirebon.
                                    </p>
                                    <br>
                                    <h4>Temukan banyak objek pariwisata menarik melalui peta kami!</h4>
                                    <p>
                                        Cari banyak lokasi objek pariwisata menarik melalui peta yang telah kami siapkan. Pilih tempat yang menarik mata anda dan cari tahu lebih lanjut dengan meng-klik lokasi untuk lihat detail lebih lengkap!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
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
