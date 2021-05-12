<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function create()
    {
        return view('users.create');
    }

    //显示个人资料
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
}
