<?php

use Illuminate\Database\Seeder;

class CampeonatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campeonatos')->insert([
            'nome' => 'Campeonato0',
        ]);

        DB::table('campeonatos')->insert([
            'nome' => 'Campeonato1',
        ]);
    }
}
