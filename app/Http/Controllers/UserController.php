<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $user;
     /**
     * LodgingController constructor.
     */
    public function __construct()
    {
        $this->user = new UserService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            $this->user->store($request);

            flash('Tambah User berhasil!')->success();
            return redirect()->route('user.index');
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
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $this->user->update($request, $user);

            flash('Tambah User berhasil!')->success();
            return redirect()->route('user.index');
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
            $user = User::findOrFail($id);
            $user->delete();
            flash('Pengguna telah dihapus!')->success();
            return redirect()->route('user.index');
        }

        catch (\Exception $exception) {
            flash($exception->getMessage())->error();
            return redirect()->back();
        }
    }
}
