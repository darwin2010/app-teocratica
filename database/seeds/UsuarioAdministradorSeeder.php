<?php

use Illuminate\Database\Seeder;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("usuario")->insert([
            "usuario" => "Admin_sertec",
            "nombre" => "Administrador",
            "password" => bcrypt("admin1234")
        ]);

        DB::table("usuario")->insert([
            "usuario" => "ancianos1",
            "nombre" => "Samir Garnica",
            "password" => bcrypt("admin1234")
        ]);

        DB::table("usuario_rol")->insert([
            "rol_id" => 1,
            "usuario_id" => 1,
            "estado" => 1
        ]);

        DB::table("usuario_rol")->insert([
            "rol_id" => 2,
            "usuario_id" => 2,
            "estado" => 1
        ]);
    }
}
