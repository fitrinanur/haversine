<?php

namespace App\Http\Controllers;

use App\Attraction;
use App\AttractionType;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $attractions = Attraction::get();
        $attractionTypes = AttractionType::get();
        $users = User::get();
        return view('dashboard.index', compact('attractions','attractionTypes','users'));
    }
}
