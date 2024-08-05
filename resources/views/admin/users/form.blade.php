<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                <h4 class="card-header">{{$page['title']}}</h4>
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" method="POST"  action="{{ $page['action'] }}">
                        @csrf
                        @method($page['method'])
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="name" name="name" value="{{old('name', $user->name ?? '')}}" required autofocus>
                                    <label for="name">Name</label>
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="text" id="email" name="email" value="{{old('email', $user->email ?? '')}}" required>
                                    <label for="email">E-mail</label>
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input class="form-control" type="password" id="password" name="password">
                                    <label for="update_password_password">Password</label>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="role" name="role" class="form-select form-select-lg"  onchange="showCard(this.value)" >
                                        <option>----------------Role----------------</option>
                                        @if (request()->is('users/create'))
                                        <option value="user">User</option>
                                        <option value="staff">Verifikator</option>
                                        <option value="admin">Admin</option>
                                        @else
                                        <option {{$user->hasRole('user') ? 'selected' : '' }} value="user">User</option>
                                        <option {{$user->hasRole('staff') ? 'selected' : '' }} value="staff">Verifikator</option>
                                        <option {{$user->hasRole('admin') ? 'selected' : '' }} value="admin">Admin</option>
                                        @endif
                                    </select>
                                    <label for="role">Role</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    @if (request()->is('users/create'))
                                    <input class="form-control" type="text" id="phone" name="phone" value="{{old('phone')}}" required>
                                    @else
                                    <input class="form-control" type="text" id="phone" name="phone" value="{{old('phone', $user->detail_users ? $user->detail_users->phone : '')}}" required>
                                    @endif
                                    <label for="phone">Phone</label>
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    @if (request()->is('users/create'))
                                    <textarea class="form-control h-px-100" name="address" placeholder="Address">{{old('address')}}</textarea>
                                    @else
                                    <textarea class="form-control h-px-100" name="address" placeholder="Address">{{old('address', $user->detail_users ? $user->detail_users->address : '' )}}</textarea>
                                    @endif
                                    <label for="address">Address</label>
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    @if (request()->is('users/create'))
                                    <input class="form-control" type="text" id="kecamatan" name="kecamatan" value="{{old('kecamatan')}}" required>
                                    @else
                                    <input class="form-control" type="text" id="kecamatan" name="kecamatan" value="{{old('kecamatan', $user->detail_users ? $user->detail_users->kecamatan : '')}}" required>
                                    @endif
                                    <label for="kecamatan">Kecamatan</label>
                                    <x-input-error class="mt-2" :messages="$errors->get('kecamatan')" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    @if (request()->is('users/create'))
                                    <input class="form-control" type="text" id="kota" name="kota" value="{{old('kota')}}" required>
                                    @else
                                    <input class="form-control" type="text" id="kota" name="kota" value="{{old('kota', $user->detail_users ? $user->detail_users->kota : '')}}" required>
                                    @endif
                                    <label for="kota">Kab/Kota</label>
                                    <x-input-error class="mt-2" :messages="$errors->get('kota')" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">{{$page['button']}}</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>


        </div>
    </div>
</x-app-layout>
