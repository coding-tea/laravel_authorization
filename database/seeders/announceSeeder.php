<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class announceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [];
        for($i=0; $i<10; $i++)
        {
            array_push($array, [
                'titre' => Str::random(5),
                'description' => Str::random(5),
                'ville' => Str::random(5),
                'type' => 'Appartement',
                'superficie' => $i,
                'prix' => $i,
                'neuf' => true
            ]);
        }
        DB::table('announces')->insert($array);
    }
}
