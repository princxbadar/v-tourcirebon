<x-layout>

    <section>
    <div class="container">
      <div class="row text-center">
        <div class="col"><h1 class="my-4">{{ $markers->tempat }}</h1></div>
      </div>
      <div class="row mb-5 justify-content-center">
        <div class="col-md-10 text-center">
          <code>
            <p>{!!$markers->keterangan!!}</p>
          </code>
        </div>
      </div>
    </div>
    </section>

    <section>
        <div class="container-fluid my-5">
            <div class="d-flex justify-content-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.388219196723!2d108.56524907475513!3d-6.722393093273556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee25deaaaaaab%3A0xb5cb14c3d5f80987!2sKeraton%20Kanoman!5e0!3m2!1sid!2sid!4v1718679988987!5m2!1sid!2sid" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

</x-layout>