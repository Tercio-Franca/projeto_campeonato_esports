<?php

use Illuminate\Database\Seeder;

class JogoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jogos')->insert([
            'nome' => 'League of Legends'
        ]);

        DB::table('jogos')->insert([
            'nome' => 'Free Fire'
        ]);
    }
}
