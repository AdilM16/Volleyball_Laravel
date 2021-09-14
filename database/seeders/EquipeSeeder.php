<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipes')->insert([
            [
                "nom"=>'Liste de selection',
                'ville'=>' ',
                'pays'=>' ',
                'joueurmax'=>999,
                'continent_id'=>1,
            ]
        ]);
    }
}
