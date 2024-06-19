<x-app-layout>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">Pengguna</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" onclick="window.location.href = '{{route('create.users')}}'">Tambah Pengguna</button>
                        <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Alamat</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($users) --}}
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                        </i><span class="fw-medium">{{$user->name ?? ''}}</span>
                                        </td>
                                        <td>{{$user->email ?? ''}}</td>
                                        <td>
                                            {{$user->roles->pluck('name')->implode(', ') ?? ''}}
                                        </td>
                                        <td>{{$user->detail_users->address ?? ''}}</td>
                                        <td style="display: flex; gap:5px;">
                                                <button style="border: none; margin-block: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #4CAF50; color: white;"
                                                        onmouseover="this.style.backgroundColor='#45a049';"
                                                        onmouseout="this.style.backgroundColor='#4CAF50';">
                                                    <a style="text-decoration: none; color: #fff;" href="{{route('edit.users', $user->id ?? '')}}"><span class="fas fa-edit" style="width: 20px"></span> </a>
                                                </button>
                                            <form action="{{route('delete.users', $user->id ?? '')}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$user->id ?? ''}}">
                                                <button onclick="return confirm('Anda yakin ingin menghapus pengguna ini?');" style="border: none; margin-block: 10px; cursor: pointer; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #f44336; color: white;"
                                                        onmouseover="this.style.backgroundColor='#e53935';"
                                                        onmouseout="this.style.backgroundColor='#f44336';">
                                                    <a style="text-decoration: none; color: #fff;" href=""><span class="fas fa-trash" style="width: 20px"></span> </a>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
