<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view("admin.index");
    }

    public function createUser(){
        return view("admin.users.create");
    }

    public function listUser(){
        return view("admin.users.list");
    }

}
