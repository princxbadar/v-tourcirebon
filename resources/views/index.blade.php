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
        <link href="{{asset('assets/style.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body>
        <main>                        
                <div class="banner">
                    <img src="{{ asset('image/background.jpg') }}"  alt="" style="max-width: 100%; max-height:100%;" >
                    <div class="banner-text text-center">
                       
                    <h1>V-Tour</h1>
                        <h4>Virtual Tour Kota Cirebon</h4>
                        <a href="{{route('homepage')}}" class="btn btn-primary">INILOGO</a>

                    </div>
                </div>

                
            


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
        </main>
    </body>
    </div>
    </div>
</html>
