<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttractionType;
use App\Services\typeAttractionService;
use App\Helpers\ResponseHelper;

class AttractionTypeController extends Controller
{
    private $attractionType;
    /**
    * LodgingController constructor.
    */
    public function __construct()
    {
       $this->middleware('auth');

       $this->attractionType = new typeAttractionService();
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attractionTypes = AttractionType::all();
        return view('attraction-types.index', compact('attractionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attraction-types.create');
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
            $attractionType = $this->attractionType->store($request);

            flash('Tambah Tipe Wisata berhasil!')->success();
            return redirect()->route('attraction-type.index');
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
    {
        return view('attraction-types.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttractionType $attractionType)
    {
        try {

            $attractionType = $this->attractionType->update($request,$attractionType);

            flash('Tambah Tipe Wisata berhasil!')->success();
            return redirect()->route('attraction-type.index');
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
    public function destroy($id)
    {
        try {
            $attractionType = AttractionType::findOrFail($id);
            $attractionType->delete();
            flash('Tipe Wisata Telah Dihapus!')->success();
            return redirect()->route('attraction-type.index');
        }

        catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return redirect()->back();
        }
    }
}
