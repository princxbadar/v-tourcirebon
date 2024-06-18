
<x-layout>

<div class="container-sm my-5 border border-5 rounded" id="map" style="width: 1080px; height: 400px;">
    <div class="map">
      <script>
        var map = L.map('map').setView([-6.706117145755258, 108.55783199712985], 15);
        
        var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        
        <?php foreach ($markers as $mrkr) : ?>
            var marker = L.marker([<?=$mrkr->latitude?>, <?=$mrkr->longitude?>])
            marker.bindPopup('<h5><?=$mrkr->tempat?></h5><br><?=$mrkr->keterangan?><br><p>Range Harga: </p>{{ "Rp " . number_format($mrkr->price,2,',','.') }}<br><a href="<?=$mrkr->navlink;?>" class="btn btn-secondary mx-3">3D-Tour</a><a href="<?=$mrkr->navlink;?>" class="btn btn-primary mx-3">Navigate</a>').addTo(map);

        <?php endforeach; ?>
        </script>
    </div>
</div>

<section class=" bg-image">
<div class="row text-center">
    <div class="col">
        <h1 class="mb-4 pt-4">Project</h1>
    </div>
</div>

<div class="container py-5 mx-auto">
<div class="row g-3">
  @foreach ($markers as $mrkr)
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card">
        <a href="{{route('detail',$mrkr->id)}}" >
          <img src="{{ asset('image/kanoman1.jpeg') }}" class="card-img-top" alt="Project1">
        </a>
        
        <div class="card-body">
        <h5 class="card-title text-center">{{$mrkr->tempat}}</h5>
        </div>
        <div class="card-footer text-body-secondary text-center">V-Tour</div>
      </div>
  </div>

  @endforeach



  
</div>
</div>
</section>

</x-layout>