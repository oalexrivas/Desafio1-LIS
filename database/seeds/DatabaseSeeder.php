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
            'nombre' => 'Entrada',
        ]);

        DB::table('tiposmovimientos')->insert([
            'nombre' => 'Salida',
        ]);

        DB::table('movimientos')->insert([
            'idTipo' => 1,
            'tipo' => 1,
            'monto' => 240,
            'fecha' => '2022-10-19 16:00:00.000000',
            'Adjunto' => 'foto1.jpg',
        ]);
        
        DB::table('movimientos')->insert([
            'idTipo' => 2,
            'tipo' => 0,
            'monto' => 180,
            'fecha' => '2022-10-19 16:20:00.000000',
            'Adjunto' => 'foto2.jpg',
        ]);

        DB::table('movimientos')->insert([
            'idTipo' => 1,
            'tipo' => 1,
            'monto' => 160,
            'fecha' => '2022-10-19 16:15:00.000000',
            'Adjunto' => 'foto3.jpg',
        ]);
    }
}