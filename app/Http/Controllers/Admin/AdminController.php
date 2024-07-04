<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard(){
        return redirect(route('list.users'));
        // return view("admin.index");
    }

    public function createUser(){
        $page = [
            'title' => 'Create User',
            'button' => 'Create User',
            'action' => route('store.users'),
            'method' => 'POST'
        ];

        return view("admin.users.form", compact('page'));
    }

    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        DetailUser::create([
            'users_id' => $user->id,
            'address' => $request->address
        ]);
        $user->assignRole($request->role);

        Alert::success('Sukses!', 'Pengguna Berhasil Dibuat');
        return redirect()->route('list.users');
    }

    public function edit($id){
        $user = User::find($id);
        $page = [
            'title' => 'Edit User',
            'button' => 'Edit User',
            'action' => route('update.users', $id),
            'method' => 'PUT'
        ];

        return view("admin.users.form", compact('user', 'page'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        DetailUser::where('users_id', $id)->update([
            'address' => $request->address
        ]);
        $user->syncRoles($request->role);

        Alert::success('Sukses!', 'Pengguna Berhasil DiUpdate');
        return redirect()->route('list.users');
    }

    public function listUser(){
        $users = User::get();
        return view("admin.users.list", compact('users'));
    }

    public function destroy($id){
        User::destroy($id);

        Alert::success('Sukses!', 'Pengguna Berhasil Dihapus');
        return redirect()->route('list.users');
    }

}
