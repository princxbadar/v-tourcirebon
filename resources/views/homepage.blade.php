
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

<section class=" bg-color">
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
        <a href="" >
          <img src="{{ asset('image/kanoman1.jpeg') }}" class="card-img-top" alt="Project1">
        </a>
        
        <div class="card-body">
        <h5 class="card-title text-center">{{$mrkr->tempat}}</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{$mrkr->id}}">More Info</button>
        </div>
        <div class="card-footer text-body-secondary text-center">V-Tour</div>
      </div>
  </div>

  @endforeach



  
</div>
</div>
</section>

<!-- Modal -->
@foreach ($markers as $mrkr)
  

<div class="modal fade" id="#detailModal{{$mrkr->id}}" tabindex="-1" aria-labelledby="#detailModal{{$mrkr->id}}Label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="#detailModal{{$mrkr->id}}Label">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.388219196723!2d108.56524907475513!3d-6.722393093273556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee25deaaaaaab%3A0xb5cb14c3d5f80987!2sKeraton%20Kanoman!5e0!3m2!1sid!2sid!4v1718611689535!5m2!1sid!2sid" width="400" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endforeach
</x-layout>