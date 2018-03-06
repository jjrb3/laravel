<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($data, [
            'name' => 'required|string|min:3|max:12',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:6'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min' => 'El nombre debe ser minimo de 3 caracteres',
            'name.max' => 'El nombre debe ser maximo de 12 caracteres',

            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email no es correcto',
            'email.max' => 'El campo email debe tener maximo 50 caracteres',

            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'El campo password debe tener minimo 6 caracteres'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'resultado' => 0,
                'titulo' => 'Advertencia',
                'mensaje' => $validator->messages()->first()
            ]);
        }

        try {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);

            return redirect('usuario');
        }
        catch (\Exception $e) {
            return response()->json([
                'resultado' => -1,
                'titulo' => 'Error',
                'mensaje' => $e->getMessage()
            ]);
        }
    }
}
