<!-- resources/views/components/marker-card.blade.php -->
<a class="text-decoration-none text-gray-900" href="{{ route('detail', $mrkr->id) }}">
    <div class="card w-100">
        <img src="{{ asset('storage/thumbnail/' . $mrkr->image) }}" class="card-img-top" alt="{{ $mrkr->tempat }}" style="height: 200px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title text-center">{{ $mrkr->tempat }}</h5>
        </div>
    </div>
</a>
