<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;
use App\Services\PictureService;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $attraction = Attraction::findOrFail($id);
            $pictureService = new PictureService();
            foreach($request->picture as $pict){
                $picture = $pictureService->store($pict, 'attraction');   
                $attraction->pictures()->create([
                    'path' => $picture['path'],
                    'file_name' => $picture['name']
                ]);
            }
            flash('Tambah Gambar berhasil!')->success();
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
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attraction $attraction, $image, Request $request)
    {
        try {
            $attraction->pictures()->where('id',$image)->delete();
            flash('Delete Gambar Berhasil!')->success();

            return redirect()->route('attraction.edit', $attraction);
        }
        catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return redirect()->back();
        }
    }
}
