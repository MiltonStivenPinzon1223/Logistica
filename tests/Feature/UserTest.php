<?php

use App\Models\User;
use Tests\TestCase;
use  Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase{

    public function test_database_connection()
    {
        $user = DB::connection()->getPdo();
        $this->assertNotNull($user, 'La conexión a la base de datos falló.');
    }

    public function test_login(){
        // se utiliza para llamar a la funcion migrate
        $carga = $this->get(route('login'));
        $carga->assertStatus(200)->assertSee('Inicio de Sesion');
    }

    // public function test_loginValid(){

    //     $response = $this->post('/login',
    //     [
    //         'email' => 'admin@gmail.com',
    //         'password' => 'asdasd123',
    //     ]);
    //     // $this->assertTrue(Auth::check());
    //     $response->assertRedirect('/logistics/create');
    //     $this->assertAuthenticated();
    // }

    public function test_loginFail(){
        // Intenta iniciar sesión con credenciales inválidas. Valida la autentificaión               
        $response = $this->post('/login', [
            'codument' => 'invalid@example.com',
            'password' => 'wrong_password',
        ]);
        $response->assertStatus(302);
        $this->assertGuest();
        $this->assertFalse(Auth::check());
    }
}