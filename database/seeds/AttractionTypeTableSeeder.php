<?php

use Illuminate\Database\Seeder;

class AttractionTypeTableSeeder extends Seeder
{
    /**
     * 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('attraction_types')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $attractionTypes = [
            [
                'name' => 'Pantai',
            ],

            [
                'name' => 'Museum',
            ],
            [
                'name' => 'Desa Wisata',
            ],
            [
                'name' => 'Sendang/Petilasan',
            ],
            [
                'name' => 'Lainnya',
            ]
        ];

        \App\AttractionType::insert($attractionTypes);
    }
}
