<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //table rol
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //table usuario
            'ver-usuario',
            //'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            //table empleado
            'ver-empleado',
            'crear-empleado',
            'editar-empleado',
            'borrar-empleado',
            //table diagrama
            'ver-diagrama',
            'crear-diagrama',
            'editar-diagrama',
            'borrar-diagrama',
        ];

        foreach ($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }
    }
}
