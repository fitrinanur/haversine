<?php
/**
 * Created by PhpStorm.
 * User: fitri
 * Date: 10/25/18
 * Time: 3:58 PM
 */
namespace App\Services;

use App\Helpers\ResponseHelper;
use App\City;
use App\Attraction;
use App\AttractionType;
use Illuminate\Support\Facades\Auth;


class AttractionService
{

    public function store($request)
    {
        $attraction = new Attraction();
        $attraction->name = $request->name;
        $attraction->attractionType()->associate($request->attractionType);
        $attraction->address = $request->address;
        $attraction->city()->associate($request->city);
        $attraction->latitude = $request->latitude;
        $attraction->longitude = $request->longitude;
		$attraction->youtube_link = $request->youtube_link;
        $attraction->instagram_link = $request->instagram_link;
        $attraction->description = $request->description;
        $attraction->save();

        if ($request->picture) {
            foreach ($request->picture as $pict) {
                $pictureService = new PictureService();
                $picture = $pictureService->store($pict, 'attraction');
                $attraction->pictures()->create([
                    'path' => $picture['path'],
                    'file_name' => $picture['name']
                ]);
            }
        }

        return $attraction;
    }

    /**
     * Update the lodging from request data into database
     * @author Eggy Endeska <eggy@hyperspace.id>
     * @param $request
     * @param $lodging
     * @return mixed
     */
    public function update($request, $attraction)
    {
        $attraction->name = $request->name;
        $attraction->attraction_type_id = $request->attractionType;
        $attraction->address = $request->address;
        $attraction->city_id =$request->city;
        $attraction->latitude = $request->latitude;
        $attraction->longitude = $request->longitude;
		$attraction->youtube_link = $request->youtube_link;
        $attraction->instagram_link = $request->instagram_link;
        $attraction->description = $request->description;
        $attraction->update();
       
        return $attraction;

    }

    public function nearbyAttraction($attraction, $request)
    {
        // try {
            $attractions = Attraction::selectRaw("
                id,
                city_id,
                atraction_type_id,
                name,
                description,
                address,
                longitude,
                latitude,
                ( 6371 * acos( cos( radians('" . $request->latitude . "') )
                       * cos( radians(latitude) )
                       * cos( radians(longitude)
                       - radians('" . $request->longitude . "') )
                       + sin( radians('" . $request->latitude . "') )
                       * sin( radians(latitude) ) ) ) AS distances
            ");

            $attractions->with('attractionType', 'city', 'city.province');

            $attractions = $attractions->havingRaw('distances < 000');

            $attractions = $attractions->whereNotNull('longitude')->get();

            return dd($attractions);


    //     }

    //     catch (\Exception $exception) {
    //         return $this->response->failedResponse($exception);
    //     }
    }
}
