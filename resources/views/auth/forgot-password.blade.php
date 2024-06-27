<x-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Atur Ulang Password</h3></div>
                    <div class="card-body">
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-label for="email" :value="__('Email')" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="d-flex justify-content-center mt-4 mb-0">
                                <x-primary-button>
                                    {{ __('Atur Ulang') }}
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

