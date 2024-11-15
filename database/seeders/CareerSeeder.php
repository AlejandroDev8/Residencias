<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('careers')->insert([
            'nombre' => 'Ingeniería en Sistemas Computacionales',
            'siglas' => 'ISC',
        ]);

        DB::table('careers')->insert([
            'nombre' => 'Ingeniería Industrial',
            'siglas' => 'IND',
        ]);

        DB::table('careers')->insert([
            'nombre' => 'Ingeniería en Gestión Empresarial',
            'siglas' => 'IGE',
        ]);

        DB::table('careers')->insert([
            'nombre' => 'Ingeniería en Industrias Alimentarias',
            'siglas' => 'IIA',
        ]);

        DB::table('careers')->insert([
            'nombre' => 'Ingeniería en Agronomía',
            'siglas' => 'IAG',
        ]);

        DB::table('careers')->insert([
            'nombre' => 'Ingeniería en Desarrollo de Aplicaciones',
            'siglas' => 'IDAP',
        ]);

        DB::table('careers')->insert([
            'nombre' => 'Ingeniería en Inteligencia Artificial',
            'siglas' => 'IAAR',
        ]);
    }
}
