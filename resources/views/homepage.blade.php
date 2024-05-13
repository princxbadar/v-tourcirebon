<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">V-Tour</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"" id="navbarNavAltMarkup">
      <ul  class="navbar-nav ms-auto">
        <li>
          <a class="nav-link" href="/login">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container-sm mt-5 border border-5 rounded" id="map" style="width: 1920px; height: 400px;">
        <div class="map">
            <script> 
        var map = L.map('map').setView([-6.706117145755258, 108.55783199712985], 15); 
        
        var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { 
            maxZoom: 19, 
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>' 
        }).addTo(map); 
        
        </script>
        </div>
    </div>

<footer class="fixed-bottom py-5 bg-body-tertiary">             
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Badar Login <?= date('Y');?></span>
        </div>
    </div>
</footer>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</body>
</html>