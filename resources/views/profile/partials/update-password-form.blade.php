<section class="py-4">
    <header>
        <h2 class="h5 text-primary">
            {{ __('Update Password') }}
        </h2>

        <p class="text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input 
                type="password" 
                name="current_password" 
                id="update_password_current_password" 
                class="form-control" 
                autocomplete="current-password" 
                required>
            @if ($errors->updatePassword->has('current_password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input 
                type="password" 
                name="password" 
                id="update_password_password" 
                class="form-control" 
                autocomplete="new-password" 
                required>
            @if ($errors->updatePassword->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input 
                type="password" 
                name="password_confirmation" 
                id="update_password_password_confirmation" 
                class="form-control" 
                autocomplete="new-password" 
                required>
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    x-init="setTimeout(() => show = false, 2000)" 
                    class="text-success mb-0"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
