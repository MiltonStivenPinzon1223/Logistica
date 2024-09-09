<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeclothingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_clothing')->insert([
            ['type' => 'Formal', 'description' => 'Camiseta blanca, pantalon y zapatos negros']
        ]);
    }
}
