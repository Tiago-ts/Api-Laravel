<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aplications = [

            [
                'name' => 'Disparo de Email',
                'token' => 'kkkkkk',
                'created_at' => now()
            ],

            [
            'name' => 'Disparo de Email',
            'token' => 'kikiki',
            'created_at' => now()
            ]
        ];

        foreach($aplications as $aplication){
            DB::table('aplications')->insert($aplication);
        }
    }
}
