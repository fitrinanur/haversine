<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AttractionsTableSeeder extends Seeder
{
 

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $generator)
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('attractions')->truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    
        $converter = new \App\Services\FileConverterService();
        $file = 'imports/Daftar Wisata.csv';

        $fileArray = $converter->csvToArray($file); 
        foreach ($fileArray as $key => $data) {
            $city = \App\City::where('name', 'like', '%'.$data['Kota'].'%')->first();
            $type = \App\AttractionType::where('name','like','%'.$data['Tipe'].'%')->first();
            $attraction = new \App\Attraction();
            $attraction->name = $data['Nama'];
            $attraction->attraction_type_id = $type->id;
            $attraction->address = $data['Alamat'];
            $attraction->city_id = $city->id;
            $attraction->latitude = $data['Latitude'];
            $attraction->longitude = $data['Longitude'];
            $attraction->phone_number = $data['No. Tlp'];
            $attraction->description = $generator->text;
            $attraction->created_at = \Carbon\Carbon::now()->subDays(rand(1, 200));
           
            $attraction->save();
        }   
        
    }
}
