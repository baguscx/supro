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

        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="phone" name="phone" value="{{old('phone', $user->detail_users ? $user->detail_users->phone : '')}}" required>
                <label for="phone">Phone</label>
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <textarea class="form-control h-px-100" name="address" placeholder="Address">{{old('email', $user->detail_users ? $user->detail_users->address : '' )}}</textarea>
                <label for="address">Address</label>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="kecamatan" name="kecamatan" value="{{old('kecamatan', $user->detail_users ? $user->detail_users->kecamatan : '')}}" required>
                <label for="kecamatan">Kecamatan</label>
                <x-input-error class="mt-2" :messages="$errors->get('kecamatan')" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="kota" name="kota" value="{{old('kota', $user->detail_users ? $user->detail_users->kota : '')}}" required>
                <label for="kota">Kab/Kota</label>
                <x-input-error class="mt-2" :messages="$errors->get('kota')" />
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save changes</button>
    </div>
</form>
