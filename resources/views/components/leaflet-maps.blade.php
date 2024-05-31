<div class="container-sm mt-5 border border-5 rounded" id="map" style="width: 1080px; height: 400px;">
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