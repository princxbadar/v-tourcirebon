<section>
    <header>
        <h2 class="">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confrimationDelete">
        Delete Account
        </button>

    <!-- Modal -->
    <div class="modal fade" id="confrimationDelete" tabindex="-1" aria-labelledby="confrimationDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p>
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
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
            <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
            <x-danger-button class="ms-3">{{ __('Delete Account') }}</x-danger-button>
        </div>
        </form>
        </div>
    </div>
    </div>
</section>
