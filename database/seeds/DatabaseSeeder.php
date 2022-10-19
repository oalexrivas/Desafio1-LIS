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
        DB::table('tiposmovimientos')->insert([
            'nombre' => "Entrada",
        ]);

        DB::table('tiposmovimientos')->insert([
            'nombre' => "Salida",
        ]);
    }
}
