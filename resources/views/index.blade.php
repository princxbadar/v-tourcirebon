<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="crossorigin=""/>
        <link href="{{asset('css/style.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body>
        <main>
            <!-- Make it look more professional and aesthetics -->
            <div
                class="bg-image d-flex justify-content-center align-items-center"
                style="
                    background-size: cover;
                    background-position: center;
                    background-image: url('{{ asset("image/carousel-1.jpg") }}');
                    height: 100vh;
                "
            >
                <!-- Blur this out -->
                <div class="bg-light rounded p-5 opacity-75">
                    <div class="text-center text-gray-900 opacity-100">
                        <h1>V-TOUR</h1>
                        <h4>Virtual Tour Kota Cirebon</h4>
                        <p>
                            Jelajahi pariwisata Kota Cirebon, kunjungi objek - objek wisata yang banyak nan indah dari Kota Cirebon.
                            <br>
                            Alami Kota Cirebon dengan cara baru melalui virtual tour.
                        </p>
                        <a href="{{route('homepage')}}" class="btn btn-outline-primary">Jelajahi</a>
                    </div>
                </div>
            </div>
            <script src="js/scripts.js"></script>
        </main>
    </body>
    </div>
    </div>
</html>
