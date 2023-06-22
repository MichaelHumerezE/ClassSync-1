<?php

namespace Database\Seeders;

use App\Models\Diagrama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diagrama::create([
            'name' => 'Diagrama 1',
        ]);

        Diagrama::create([
            'name' => 'DB-Veterinaria',
        ]);

        Diagrama::create([
            'name' => 'Diagrama 3',
        ]);

        Diagrama::create([
            'name' => 'Diagrama 4',
        ]);

        Diagrama::create([
            'name' => 'Diagrama 5',
        ]);
    }
}
