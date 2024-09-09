<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    public function run()
    {
        DB::table('rols')->insert([
            ['rol' => 'Logistico'],
            ['rol' => 'Coordinador'],
            ['rol' => 'Soporte'],
        ]);
    }
}
