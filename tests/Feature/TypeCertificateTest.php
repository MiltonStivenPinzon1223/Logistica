<?php
use App\Models\Certificate;
use App\Models\Logistic;
use App\Models\Role;
use App\Models\TypeCertificate;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TypeCertificateTest extends TestCase
{

    public function test_index()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get(route('type.certificates.index'));
        $response->assertStatus(200);
        $response->assertSee('Tipo de certificado');
    }

    public function test_create()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get(route('type.certificates.create'));
        $response->assertStatus(200);
        $response->assertSee('Tipo de certificado');
    }

    public function test_store()
    {
        $user = User::first();
        $this->actingAs($user);

        $data = [
            'name' => 'Nuevo type',
        ];

        $response = $this->post(route('type.certificates.store'), $data);

        $response->assertRedirect(route('type.certificates.index'));

        $this->assertDatabaseHas('type_certificates', [
            'name' => $data['name'],
        ]);
    }

    public function test_show()
    {
        $user = User::first();
        $this->actingAs($user);

        $role = Role::first();

        $response = $this->get(route('type.certificates.show', $role));
        $response->assertStatus(200);
        $response->assertSee('Rol');
    }

    public function test_edit()
    {
        $user = User::first();
        $this->actingAs($user);

        $role = Role::first();

        $response = $this->get(route('type.certificates.edit', $role));
        $response->assertStatus(200);
        $response->assertSee('certificado');
    }

    public function test_update()
    {
        $user = User::first();
        $this->actingAs($user);

        $type = TypeCertificate::first();

        $updatedData = [
            'name' => 'tipo actualizado.',
        ];

        $response = $this->patch(route('type.certificates.update', $type), $updatedData);

        $response->assertRedirect(route('type.certificates.index'));

        $this->assertDatabaseHas('type_certificates', [
            'name' => $updatedData['name'],
        ]);

        $type->refresh();
        $this->assertEquals($updatedData['name'], $type->name);
    }
}
