<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;
use App\AttractionType;
use App\Guestbook;
use App\Services\AttractionService;
use League\Geotools\Coordinate\Ellipsoid;
use Toin0u\Geotools\Facade\Geotools;
use Mapper;


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
//    public function getRecommendation($count = 10){
////
//        if(request()->get('lat') != null && request()->get('lon') != null) {
//            $latitude = floatval(request('lat'));
//            $longitude = floatval(request('lon'));
//
//
//
//            $range = 20;
//
//            $attractions = Attraction::location($latitude, $longitude, $range)
//                ->get();
//            while ($attractions->count() < $count) {
//                $range += 20;
//                $attractions = Attraction::location($latitude, $longitude, $range)
//                    ->take($count)
//                    ->get();
//            }
//        }
//        else {
//            $attractions = Attraction::inRandomOrder()->take($count)->get();
//        }
//
//        return view ('website.recommendation',compact('attractions','latitude','longitude'));
//    }
    /**
     * index
     *
     * @return void
     */


    public function index()
    {
            return view('website.index', compact('attractions'));
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
    public function location()
    {
        return view('website.location');
    }

    /**
     * direction-page
     *
     * @return void
     */
    public function directionPage(Request $request)
    {
        $directionTypes = $this->directionType();

        return view('website.direction', compact('directionTypes','response','start_location','end_location','map'));

    }

    public function nearlyPage($count=10)
    {
        // dd(request()->all());
        if (request()->get('latitude') && request()->get('longitude')){
            
            $attractionTypes = AttractionType::all();
            $mapWithPolyline = [];
            $latitude = floatval(request()->get('latitude'));
            $longitude = floatval(request()->get('longitude'));
            $range = 100;

            $category=request()->get('attractionType');
            if($category){
                $attractions = Attraction::location($latitude, $longitude, $range)->where('attraction_type_id',$category)->take($count)->get();
                
                foreach ($attractions as $attraction){
                    $distance = round($attraction->distance,3);
                
                    $mapWithPolyline = Mapper::map($latitude, $longitude,['zoom' => 11])
                        ->informationWindow($attraction->latitude, $attraction->longitude, $distance, ['markers' => ['animation' => 'DROP']])
                        ->polyline([['latitude' => $latitude, 'longitude' => $longitude], ['latitude' => $attraction->latitude, 'longitude' => $attraction->longitude]], ['strokeColor' => '#EA4335', 'strokeWeight' => 3]);
                }
            } else {
                $attractions = Attraction::location($latitude, $longitude, $range)->take($count)->get();
                
                foreach ($attractions as $attraction){
                    $distance = round($attraction->distance,3);
                
                    $mapWithPolyline = Mapper::map($latitude, $longitude,['zoom' => 11])
                        ->informationWindow($attraction->latitude, $attraction->longitude, $distance, ['markers' => ['animation' => 'DROP']])
                        ->polyline([['latitude' => $latitude, 'longitude' => $longitude], ['latitude' => $attraction->latitude, 'longitude' => $attraction->longitude]], ['strokeColor' => '#EA4335', 'strokeWeight' => 3]);
                }

            }
           
            
            return view('website.nearly',compact('latitude','longitude','attractions','mapWithPolyline','attractionTypes','category'));
        }
        else{
            return view('website.location');
        }
    }

    private function directionType()
    {
        $directionTypes =
        [
            '1' => 'Alamat',
            '2' => 'Longitude&Latitude',
        ];

        return $directionTypes;
    }

    public function directionStore(Request $request)
    {
        // dd($request->all());
        if($request->type == "1"){
            // dd($request->type);
            urlencode($destination = $request->address);
            urlencode($origin = $request->start_location);
            $url = "https://www.google.com/maps/dir/?api=1&origin=".$origin."&destination=".$destination;
            // https://maps.google.com?saddr=".$origin."&daddr=".$destination314+Avery+Avenue+Syracuse+NY+13204
            return redirect()->away($url);

        }else{
            $lat = $request->latitude;
            $lang = $request->longitude;

            $lat1 = request()->get('lat');
            $lon = request()->get('lon');
            $url = "https://www.google.com/maps/dir/Current+Location/".$lat.",".$lang;
            return redirect()->away($url);

        }
    }

    public function guestbook(Request $request)
    {
        try {
            $guestbook = new Guestbook();
            $guestbook->email = $request->email;
            $guestbook->message = $request->message;
            $guestbook->save();

            flash('Terimakasih atas saran dan kritik anda.')->success();
            return redirect()->route('website.index');
         }
         catch (\Exception $exception) {
             flash($exception->getMessage())->error();
             return redirect()->back();
         }
    }

    public function cobaPolyline()
    {
        Mapper::map(-7.7470586, 110.39014200000001)->polyline([['latitude' => -7.7470586, 'longitude' => 110.39014200000001], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#AED4FC', 'strokeWeight' => 2]);

        return view('website.polyline');
    }

    public function position($count = 10){
        if(request()->get('lat') != null && request()->get('lon') != null) {
            $latitude = floatval(request('lat'));
            $longitude = floatval(request('lon'));



        }
        return view ('website.map',compact('latitude','longitude'));
    }

}
