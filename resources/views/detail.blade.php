<x-layout>
    <div class="container-fluid bg-color py-5 rounded">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <code>
                    <p>{!!$markers->link!!}</p>
                </code>
            </div>
        </div>
    </div>
    <div class="mx-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="row py-5">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h1 class="py-4">{{ $markers->tempat }}</h1>
                    <code>
                        <p>{!!$markers->keterangan!!}</p>
                    </code>
                    <p>Harga:</p>
                    <p>{{ "Rp " . number_format($markers->price_start,2,',','.') }} sampai {{ "Rp " . number_format($markers->price_end,2,',','.') }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h1 class="py-4 text-center">Peta</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        <code>
                            <p>{!!$markers->navlink!!}</p>
                        </code>
                    </div>
                    <h1 class="py-4 text-center">Ulasan</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0" width="600" height="400"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid bg-color py-5">
            <h1 class="text-gray-900 text-center mb-5">
                Akomodasi
            </h1>
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <div class="card-wrapper container-sm d-flex justify-content-around">
                        @foreach ($marker as $mrkr)
                            <div class="card"  style="width: 16rem";>
                                <a href="">
                                    <img src="{{ asset('image/kanoman1.jpeg') }}" class="card-img-top" alt="Project1">
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$mrkr->tempat}}</h5>
                                </div>

                                <div class="card-footer text-body-secondary text-center">V-Tour</div>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</x-layout>
