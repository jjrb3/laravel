<?php

namespace App\Http\Controllers;

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

    public function create() {
        return "Crear un usuario";
    }
}
