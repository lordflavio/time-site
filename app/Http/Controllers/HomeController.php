<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\backing;
use App\Models\item;
use App\Models\Clubs;
use App\Models\News;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $backings = backing::all();
       $items = item::all();
       $clubs = Clubs::all();
       $news = News::all();

       return view('Admin/Home/home', compact('backings','items','clubs','news'));
    }
}
