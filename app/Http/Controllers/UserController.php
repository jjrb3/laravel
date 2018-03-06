<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index() {
        $users = [
            'Jeremy',
            'Deivis',
            'Jani',
            'Alvaro',
            'Janer',
            '<script>alert("Click");</script>'
        ];

        return view('users',compact('users'));
    }

    public function show($id) {
        return "Usuario {$id}";
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
