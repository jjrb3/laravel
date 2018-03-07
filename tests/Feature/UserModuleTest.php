<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    /*
    public function testUsuarioNombre()
    {
        $this->get('/usuario')
            ->assertStatus(200)
            ->assertSee('Jeremy')
            ->assertSee('Deivis')
            ->assertSee('Alvaro');
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
    }*/

    public function testCrearUsuario() {


        $this->post('/usuario/crear',[
            'name' => '',
            'email' => 'jjrb6@hotmail.com',
            'password' => '123456'
        ])
            ->assertSee('El campo nombre es obligatoriosd');

        /* Consultar en la DB
        $this->assertDatabaseHas('users',[
            'name' => 'Jeremy',
            'email' => 'jjrb6@hotmail.com',
            //'password' => '123456'
        ]);
        */
        /*$this->assertCredentials([
            'name' => 'Jeremy',
            'email' => 'jjrb6@hotmail.com',
            'password' => '123456'
        ]);*/
    }

    public function testActualizarUsuario() {

        $this->withoutExceptionHandling();

        $this->put('usuario/1', [
            'name' => 'Jeremy',
            'email' => 'jj@jj.com',
            'password' => '1234567'
        ])
            //->assertStatus(200)
            ->assertRedirect('usuario')
            //->assertSessionHasErrors(['name'])
        ;
    }

    public function testEliminar() {

        $user = factory(\App\User::class)->create();

        $this->delete("/usuario/{$user->id}")
            ->assertStatus(200);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);

    }
}
