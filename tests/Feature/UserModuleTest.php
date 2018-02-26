<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    public function testUsuarioNombre()
    {
        $this->get('/usuario')
            ->assertStatus(200)
            ->assertSee('Usuarios');
    }

    public function testUsuarioNombreApellido() {

        $this->get('/usuario/3')
            ->assertStatus(200)
            ->assertSee('Usuario 3');
    }

    public function testNombre()
    {
        $this->get('usuario/Jeremy')
            ->assertStatus(200)
            ->assertSee('El nombre es Jeremy sin apellido');
    }

    public function testNombreApellido() {

        $this->get('usuario/Jeremy/Reyes')
            ->assertStatus(200)
            ->assertSee('El nombre es Jeremy Reyes');
    }
}
