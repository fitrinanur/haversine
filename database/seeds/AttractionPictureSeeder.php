<?php

use Illuminate\Database\Seeder;

class AttractionPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $converter = new \App\Services\FileConverterService();
            $file = 'imports/attraction_picture.csv';
    
            $fileArray = $converter->csvToArray($file);
            foreach ($fileArray as $key => $data) {
                $attraction = \App\Attraction::find($data['attraction_id']);
                if($attraction != null) {
                    $attraction->pictures()->create([
                        'path' => 'attraction',
                        'file_name' => strtolower($data['file_name'])
                    ]);
                }
            }
        }
    }
}
