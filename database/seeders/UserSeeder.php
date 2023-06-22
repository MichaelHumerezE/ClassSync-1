<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Administrador',
            'apellidos' => '',
            'email' => 'admin@gmail.com',
            'password' => '123456',
            'ci' => '9866021',
            'sexo' => 'M',
            'phone' => '60522212',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Michael',
            'apellidos' => 'Humerez Estepo',
            'email' => 'a@gmail.com',
            'password' => '123456',
            'ci' => '9866024',
            'sexo' => 'M',
            'phone' => '60522214',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
        ])->assignRole('Administrador');
        
        User::create([
            'name' => 'Brayan',
            'apellidos' => '',
            'email' => 'b@gmail.com',
            'password' => '123456',
            'ci' => '9866022',
            'sexo' => 'M',
            'phone' => '60522211',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Camilo',
            'apellidos' => '',
            'email' => 'c@gmail.com',
            'password' => '123456',
            'ci' => '9866023',
            'sexo' => 'M',
            'phone' => '60522213',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Humberto',
            'apellidos' => 'Lazo Mansilla',
            'email' => 'h@gmail.com',
            'password' => '123456',
            'ci' => '9866028',
            'sexo' => 'M',
            'phone' => '60522218',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'José Miguel',
            'apellidos' => '',
            'email' => 'j@gmail.com',
            'password' => '123456',
            'ci' => '9866029',
            'sexo' => 'M',
            'phone' => '60522219',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Luis Emilio',
            'apellidos' => '',
            'email' => 'l@gmail.com',
            'password' => '123456',
            'ci' => '9864174',
            'sexo' => 'M',
            'phone' => '60521400',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Martha',
            'apellidos' => '',
            'email' => 'm@gmail.com',
            'password' => '123456',
            'ci' => '9864175',
            'sexo' => 'F',
            'phone' => '60521401',
            'domicilio' => 'Santa Cruz',
            'estado' => '1',
        ])->assignRole('Administrador');
    }
}
