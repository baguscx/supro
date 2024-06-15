<form id="formAccountSettings" method="POST"  action="{{ route('profile.update') }}">
    @csrf
    @method('patch')
    <div class="row gy-4">
        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="name" name="name" value="{{old('name', $user->name)}}" required autofocus>
                <label for="name">Name</label>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="email" name="email" value="{{old('email', $user->email)}}" required>
                <label for="email">E-mail</label>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="address" placeholder="Address">{{old('email', $user->detail_users ? $user->detail_users->address : '' )}}</textarea>
                <label class="ps-4">Address</label>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save changes</button>
    </div>
</form>
