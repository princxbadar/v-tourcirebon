<x-dashboard-layout>
    <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Accomodation Management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Accomodation Management</li>
                </ol>

                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#insertAccomodationModal">
                Add New Accomodation
                </button>


                <div class="card mb-4">
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Markers Name</th>
                            <th scope="col">Price Start</th>
                            <th scope="col">Price End</th>
                            <th scope="col">Image</th>
                            <th scope="col">Traveloka Link</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @forelse ($accomodations as $data)
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->tempat}}</td>
                                <td>{{ $data->start_price}}</td>
                                <td>{{ $data->end_price}}</td>
                                <td>{{ $data->thumb_image}}</td>
                                <td>{{ $data->traveloka_link}}</td>
                                <td>
                                    <button class="badge rounded-pill text-bg-primary" data-bs-toggle="modal" data-bs-target="#updateAccomodation-{{ $data->id }}">Update</button>
                                    <form action="{{ route('admin.delete-accomodation', $data->id) }}" method="POST">
                                        @csrf  @method('DELETE') <button type="submit" class="badge rounded-pill text-bg-danger">Delete</button>
                                      </form>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                            Data belum Tersedia.
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- Insert Modal -->
        <div class="modal fade modal-xl" id="insertAccomodationModal" tabindex="-1" aria-labelledby="insertAccomodationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertAccomodationModalLabel">Create Accomodation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{route('admin.create-accomodation')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" name class="form-label">Nama Tempat</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" >
                    </div>
                    <div class="mb-3">
                        <select name="markers_id" class="form-control @error('markers_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Nama Tempat</option>
                            @foreach ($markers as $data )
                                <option value="{{$data->id}}">{{ $data->tempat  }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="start_price" name class="form-label">Harga Dimulai Dari</label>
                        <input type="number" name="start_price" class="form-control @error('start_price') is-invalid @enderror" id="start_price" value="{{ old('start_price') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="end_price" name class="form-label">Harga Sampai</label>
                        <input type="number" name="end_price" class="form-control @error('end_price') is-invalid @enderror" id="end_price" value="{{ old('end_price') }}" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Image</label>
                        <input type="file" class="form-control @error('thumb_img') is-invalid @enderror" name="thumb_img">

                        <!-- error message untuk image -->
                        @error('thumb_img')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="traveloka_link" name class="form-label">Link</label>
                        <input type="text" name="traveloka_link" class="form-control @error('traveloka_link') is-invalid @enderror" id="traveloka_link" value="{{ old('traveloka_link') }}" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
                </div>
            </div>
        </div>

  <!-- Update Modal -->
  @foreach ($accomodations as $data)
  <div class="modal fade modal-xl" id="updateAccomodation-{{ $data->id }}" tabindex="-1" aria-labelledby="updateAccomodation" aria-hidden="false">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="updateAccomodationModalLabel">Update Accomodation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="{{route('admin.update-accomodation', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="mb-3">
                  <label for="name" name class="form-label">Nama Tempat</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $data->name }}" >
              </div>
                <div class="mb-3">
                    <select name="markers_id" class="form-control @error('markers_id') is-invalid @enderror" aria-label="Default select example">
                        <option selected>Nama Tempat</option>
                        @foreach ($markers as $marker )
                            <option value="{{$marker->id}}">{{ $marker->tempat  }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="start_price" name class="form-label">Start Price</label>
                    <input type="number" name="start_price" class="form-control @error('start_price') is-invalid @enderror" id="start_price" value="{{ $data->start_price }}" >
                </div>
              <div class="mb-3">
                  <label for="end_price" name class="form-label">End Price</label>
                  <input type="number" name="end_price" class="form-control @error('end_price') is-invalid @enderror" id=end_price" value="{{ $data->end_price }}" >
              </div>
              <div class="form-group mb-3">
                    <label class="font-weight-bold">Image</label>
                        <input type="file" class="form-control @error('thumb_img') is-invalid @enderror" name="thumb_img">

                    <!-- error message untuk image -->
                    @error('thumb_img')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              <div class="mb-3">
                  <label for="traveloka_link" name class="form-label">Link Traveloka</label>
                  <input type="text" name="traveloka_link" class="form-control @error('traveloka_link') is-invalid @enderror" id="traveloka_link" value="{{ $data->traveloka_link }}" >
              </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
          </div>
      </div>
  </div>
@endforeach


    </x-dashboard-layout>
