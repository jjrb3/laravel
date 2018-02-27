<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    public function __invoke($nombre, $apellido = null) {
        if ($apellido) {
            return "El nombre es {$nombre} {$apellido}";
        }
        else {
            return "El nombre es {$nombre} sin apellido";
        }
    }
}
