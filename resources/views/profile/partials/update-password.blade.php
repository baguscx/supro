<form id="formAccountSettings" method="POST"  action="{{ route('password.update') }}">
    @csrf
    @method('put')
    <div class="row gy-4">
        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <input class="form-control" type="password" id="current_password" name="current_password">
                <label for="current_password">Current Password</label>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <input class="form-control" type="password" id="update_password_password" name="password">
                <label for="update_password_password">New Password</label>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <input class="form-control" type="password" id="update_password_password_confirmation" name="password_confirmation">
                <label for="update_password_password_confirmation">Confirm New Password</label>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Change Password</button>
    </div>
</form>
