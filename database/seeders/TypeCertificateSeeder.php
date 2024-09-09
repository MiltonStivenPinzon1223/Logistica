<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeCertificateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_certificates')->insert([
            ['name' => 'Primeros Auxilios']
        ]);
    }
}
