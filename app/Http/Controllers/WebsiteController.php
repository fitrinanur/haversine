<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;
use App\AttractionType;
use App\Guestbook;
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
        $directionTypes = $this->directionType();

        return view('website.direction', compact('directionTypes','response','start_location','end_location','map')); 
      
    }

    public function nearlyPage()
    {
        
        return view('website.nearly');
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
}
