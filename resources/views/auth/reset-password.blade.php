<x-layout>
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Atur Ulang Password</h3></div>
            <div class="card-body">
            <form method="POST" action="{{ route('password.store') }}">
            @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="form-floating mb-3">
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-label for="email" :value="__('Email')" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-floating mb-3">
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                        <x-input-label for="password" :value="__('Password')" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="form-floating mb-3">
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="d-flex justify-content-center mt-4 mb-0">
                        <x-primary-button>
                            {{ __('Atur Ulang Password') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
            </div>
        </div>
    </div>
</div>
</div>

</x-layout>