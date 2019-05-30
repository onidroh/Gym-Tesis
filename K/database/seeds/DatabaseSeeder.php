<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*/// $this->call(UsersTableSeeder::class);
        DB::table('estado')->insert([
            'nomEstado' => 'activo',
        ]);
        DB::table('estado')->insert([
            'nomEstado' => 'inactivo',
        ]);
        DB::table('rol')->insert([
            'nomRol' => 'Administrador',
        ]);
        DB::table('rol')->insert([
            'nomRol' => 'Profesor',
        ]);
        DB::table('rol')->insert([
            'nomRol' => 'Visualizador',
        ]);
        DB::table('rol')->insert([
            'nomRol' => 'Usuario',
        ]);*/

        DB::table('usuario')->insert([
            'rutUsuario' => 18746193,
            'passUsuario' => bcrypt('123'),
            'nomUsuario' => 'Oscar Escobar Moraga',
            'mailUsuario' => 'onidroh@gmail.com',
            'fonoUsuario' => 984250339,
            'Rol_idRol' => 1,
            'created_at' => now(),
        ]);
    }
}
