<?php

use App\Models\Certificate;
use App\Models\Logistic;
use App\Models\TypeCertificate;
use App\Models\User;
use Tests\TestCase;
use  Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateTest extends TestCase{

    public function test_database_connection()
    {
        $user = DB::connection()->getPdo();
        $this->assertNotNull($user, 'La conexión a la base de datos falló.');
    }

    public function test_index(){
        $user = User::first();
        $this->actingAs($user);

        // Hacemos la solicitud
        $response = $this->get(route('certificates.index'));

        // Verificamos el estado de respuesta y el contenido
        $response->assertStatus(200); // Asumimos que debería ser 200 si está autenticado
        $response->assertSee('Certificados');
    }

    public function test_create(){
        $user = User::first();
        $this->actingAs($user);
        // se utiliza para llamar a la funcion migrate
        $carga = $this->get(route('certificates.create'));
        $carga->assertStatus(200)->assertSee('Certificados');
    }

    public function test_store()
    {
        // Simulamos una sesión de autenticación
        $user = User::first();
        $this->actingAs($user);

        // Creamos un nuevo registro de certificado
        $certificate = Certificate::make([
            'id_type_certificates' => TypeCertificate::first()->id,
            'id_logistics' => Logistic::first()->id,
        ]);

        // Hacemos la solicitud POST al endpoint de almacenamiento
        $response = $this->post(route('certificates.store'), $certificate->toArray());

        // Verificamos que se realice una redirección
        $response->assertRedirect(route('certificates.index'));

        // Verificamos que el registro haya sido creado en la base de datos
        $this->assertDatabaseHas('certificates', [
            'id_type_certificates' => $certificate->id_type_certificates,
            'id_logistics' => $certificate->id_logistics,
        ]);
    }


    public function test_show(){
        $user = User::first();
        $this->actingAs($user);
        $certificate = Certificate::first();
        // se utiliza para llamar a la funcion migrate
        $carga = $this->get(route('certificates.show', $certificate->id));
        $carga->assertStatus(200)->assertSee('Tipo de certificados');
    }

    public function test_edit(){
        $user = User::first();
        $this->actingAs($user);
        // se utiliza para llamar a la funcion migrate
        $certificate = Certificate::first();
        // se utiliza para llamar a la funcion migrate
        $carga = $this->get(route('certificates.edit', $certificate->id));
        $carga->assertStatus(200)->assertSee('Submit');
    }

    public function test_update()
    {
        // Simulamos una sesión de autenticación
        $user = User::first();
        $this->actingAs($user);

        // Buscamos un registro existente de certificado
        $certificate = Certificate::first();

        // Preparamos los datos para actualizar
        $updatedData = [
            'id_type_certificates' => TypeCertificate::first()->id,
            'id_logistics' => Logistic::first()->id,
        ];

        // Hacemos la solicitud PUT al endpoint de actualización
        $response = $this->patch(route('certificates.update', $certificate), $updatedData);

        // Verificamos que se realice una redirección
        $response->assertRedirect(route('certificates.index'));

        // Verificamos que los cambios hayan sido aplicados en la base de datos
        $this->assertDatabaseHas('certificates', [
            'id' => $certificate->id,
            'id_type_certificates' => $updatedData['id_type_certificates'],
            'id_logistics' => $updatedData['id_logistics'],
        ]);

        // Verificamos que el modelo haya sido actualizado
        $certificate->refresh();
        $this->assertEquals($updatedData['id_type_certificates'], $certificate->id_type_certificates);
        $this->assertEquals($updatedData['id_logistics'], $certificate->id_logistics);
    }
}