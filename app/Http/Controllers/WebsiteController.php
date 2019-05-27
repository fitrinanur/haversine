<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;
use App\AttractionType;
use App\Services\AttractionService;
use League\Geotools\Coordinate\Ellipsoid;
use Toin0u\Geotools\Facade\Geotools;

class WebsiteController extends Controller
{
    private $attraction;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->attraction = new AttractionService();
    }

    /**
     * getRecommendation
     *
     * @return void
     */
    public function getRecommendation($count = 10){
        if(request()->get('lat') != null && request()->get('lon') != null) {
            $latitude = floatval(request('lat'));
            $longitude = floatval(request('lon'));

            

            $range = 20;

            $attractions = Attraction::location($latitude, $longitude, $range)
                ->get();
            while ($attractions->count() < $count) {
                $range += 20;
                $attractions = Attraction::location($latitude, $longitude, $range)
                    ->take($count)
                    ->get();
            }
        }
        else {
            $attractions = Attraction::inRandomOrder()->take($count)->get();
        }

        return view ('website.recommendation',compact('attractions','latitude','longitude'));
    }
    /**
     * index
     *
     * @return void
     */

    
    public function index()
    {
        $attractions =  Attraction::limit(3);
        return view('website.index',compact('attractions'));
    }

    /**
     * gallery
     *
     * @return void
     */
    public function galleryPage()
    {
        $attractionTypes = AttractionType::all();
        $attractions = Attraction::all();
        return view('website.gallery', compact('attractions', 'attractionTypes')); 
    }

    /**
     * direction-page
     *
     * @return void
     */
    public function directionPage(Request $request)
    {
        $rides = $this->rideMethod();
        $start_location = '-7.788370';
        $end_location = '110.363645';

        return view('website.direction', compact('rides','response','start_location','end_location','map')); 
      
    }

    public function nearlyPage()
    {
        
        return view('website.nearly');
    } 


    private function rideMethod()
    {
        $rides =
        [
            '1' => 'Berkendara',
            '2' => 'Bersepeda',
            '3' => 'Transportasi Umum',
            '4' => 'Jalan Kaki'
        ];

        return $rides;
    }
}
