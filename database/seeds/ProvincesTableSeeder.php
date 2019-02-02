<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('provinces')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $converter = new \App\Services\FileConverterService();
        $file = 'imports/provinces.csv';

        $fileArray = $converter->csvToArray($file);

        foreach ($fileArray as $key => $data) {
            \App\Province::create([
                'old_id' => $data['ID'],
                'name' => $data['NAMA']
            ]);
        }
    }
}
