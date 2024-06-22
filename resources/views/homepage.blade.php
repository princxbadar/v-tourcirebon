
<x-layout>


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