<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttractionType;
use App\Attraction;
use App\City;
use App\Province;
use App\services\AttractionService;

class AttractionController extends Controller
{
    private $attraction;
    /**
    * LodgingController constructor.
    */
    public function __construct()
    {
       $this->middleware('auth');

       $this->attraction = new AttractionService();
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attractions = Attraction::all();
        return view('attractions.index', compact('attractions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attractionTypes = AttractionType::all();
        $cities = City::all();
        $provincies = Province::all();
        
        return view('attractions.create', compact('attractionTypes','provincies','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->attraction->store($request);

            flash('Tambah penginapan berhasil!')->success();
            return redirect()->route('attraction.index');
         }
         catch (\Exception $exception) {
             flash($exception->getMessage())->error();
             return redirect()->back();
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $attraction = Attraction::findOrFail($id);
        $attractionTypes = AttractionType::all();
        $cities = City::all();
        $provincies = Province::all();
        
        return view('attractions.edit', compact('attraction','attractionTypes','provincies','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attraction $attraction)
    {
        try {
            $attraction = $this->attraction->update($request,$attraction);

            flash('Update Wisata berhasil!')->success();
            return redirect()->route('attraction.index');
        }
         catch (\Exception $exception) {
             flash($exception->getMessage())->error();
             return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attraction $attraction)
    {
        try {
            $attraction->delete();
            flash('Data Wisata telah dihapus!')->success();
            return redirect()->route('attraction.index');
        }

        catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return redirect()->back();
        }
    }
}
