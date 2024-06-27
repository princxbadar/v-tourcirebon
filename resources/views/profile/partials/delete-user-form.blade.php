<section>
    <header>
        <h2 class="">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1">
            {{ __('Ketika anda menghapus akun, semua data yang terkait akun ini akan dihapus secara permanen. Silahkan simpan semua data penting sebelum anda menghapus akun.') }}
        </p>
    </header>

    <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confrimationDelete">
        Hapus Akun
        </button>

    <!-- Modal -->
    <div class="modal fade" id="confrimationDelete" tabindex="-1" aria-labelledby="confrimationDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2">
                {{ __('Apakah anda yakin ingin mengapus akun ini?') }}
            </h2>

            <p>
                {{ __('Ketika anda menghapus akun, semua data yang terkait akun ini akan dihapus secara permanen. Mohon masukan password akun ini sebagai konfirmasi penghapusan.') }}
            </p>

            <div>
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control mb-3"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <x-danger-button class="ms-3">{{ __('Hapus') }}</x-danger-button>
        </div>
        </form>
        </div>
    </div>
    </div>
</section>
