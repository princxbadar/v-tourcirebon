<x-layout>
<x-auth-session-status class="mb-4" :status="session('status')" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email -->
                        <div class="form-floating mb-3">
                            <!-- <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" /> -->
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-label for="email" :value="__('Email')" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                            <x-input-label for="password" :value="__('Password')" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="remember_me" type="checkbox" value="" />
                            <label class="form-check-label" for="inputRememberPassword">{{ __('Remember me') }}</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                        @endif
                            <x-primary-button class="btn btn-primary">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>
                    
