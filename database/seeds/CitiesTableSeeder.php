<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('cities')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $converter = new \App\Services\FileConverterService();
        $file = 'imports/cities.csv';

        $fileArray = $converter->csvToArray($file);

        foreach ($fileArray as $key => $data) {
            $province = \App\Province::where('old_id', $data['PROVINSI_ID'])->first();
            $city = \App\City::create([
                'province_id' => $province->id,
                'name' => $data['NAMA'],
            ]);
        }
    }
}
