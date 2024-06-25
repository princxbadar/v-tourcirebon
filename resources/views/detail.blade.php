<x-layout>
    <div class="container-fluid bg-color p-3 rounded">
        <h1 class="mb-2 text-center">{{ $markers->tempat }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-12 h-100 text-center">
                <code>
                    <p>{!! $markers->link !!}</p>
                </code>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center p-3">
        <div class="card">
            <div class="card-body">
                <div class="row g-5 p-6">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6>Gambar dan Lokasi Tempat</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-7 col-md-12 col-sm-12">
                                        <img src="{{ asset('storage/thumbnail/' . $markers->image) }}" alt="{{ $markers->tempat }}" class="rounded img-fluid">
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-sm-12">
                                        <div class="d-flex justify-content-center align-items-center mb-3">
                                            <code>
                                                <p>{!!$markers->navlink!!}</p>
                                            </code>
                                        </div>
                                        <h5>Alamat:</h5>
                                        <h6>
                                            {{ $markers->address }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <h1 class="mb-2 text-start">Tentang {{ $markers->tempat }}</h1>
                                <div class="text-start">
                                    <code>
                                        <p>{!!$markers->keterangan!!}</p>
                                    </code>
                                    <p>Harga:</p>
                                    <p>{{ "Rp " . number_format($markers->price_start,2,',','.') }} sampai {{ "Rp " . number_format($markers->price_end,2,',','.') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <h1 class="mb-2 text-center">Ulasan</h1>
                                <div class="d-flex justify-content-center align-items-center">
                                    <code>
                                        <p>{!! $markers->youtube_link !!}</p>
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="container-fluid bg-color p-3">
                            <h1 class="text-gray-900 text-center mb-5">
                                Akomodasi
                            </h1>
                            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <div class="card-wrapper container-sm d-flex justify-content-around">
                                        @foreach ($accommodations as $accommodation)
                                            <a class="text-decoration-none" href="{{ url($accommodation->traveloka_link) }}">
                                                <div class="card">
                                                    <img src="{{ asset('storage/thumbnail/' . $accommodation->thumb_img) }}" class="card-img-top" style="height: 500px" alt="Project1">

                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">
                                                            {{$accommodation->name}}
                                                        </h5>
                                                        <p class="text-center">
                                                            {{ "Rp " . number_format($accommodation->start_price,2,',','.') }} sampai {{ "Rp " . number_format($accommodation->end_price,2,',','.') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
