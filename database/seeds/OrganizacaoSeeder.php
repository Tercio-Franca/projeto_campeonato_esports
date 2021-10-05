<?php

use Illuminate\Database\Seeder;

class OrganizacaoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizacoes')->insert([
            'nome' => 'OrgTeste0',

        ]);

        DB::table('organizacoes')->insert([
            'nome' => 'OrgTeste1'
        ]);
    }
}
