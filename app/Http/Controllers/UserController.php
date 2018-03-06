<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index() {

        $users = User::all();

        return view('users',compact('users'));
    }

    public function show(User $user) {

        return view('detail-user',['user' => $user]);
    }

    public function create(Request $request) {

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect('usuario');
    }
}
