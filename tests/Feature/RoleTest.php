<?php
use App\Models\Certificate;
use App\Models\Logistic;
use App\Models\Role;
use App\Models\TypeCertificate;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RoleTest extends TestCase
{

    public function test_index()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get(route('roles.index'));
        $response->assertStatus(200);
        $response->assertSee('Roles');
    }

}
