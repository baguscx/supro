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
                                        <option {{$user->hasRole('user') ? 'selected' : '' }} value="user">User</option>
                                        <option {{$user->hasRole('staff') ? 'selected' : '' }} value="staff">Verifikator</option>
                                        <option {{$user->hasRole('admin') ? 'selected' : '' }} value="admin">Admin</option>
                                    </select>
                                    <label for="role">Role</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating form-floating-outline">
                                    <textarea class="form-control h-px-100" name="address" placeholder="Address">{{old('email', $user->detail_users ?? '' ? $user->detail_users->address : '' ?? '' )}}</textarea>
                                    <label class="ps-4">Address</label>
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
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
