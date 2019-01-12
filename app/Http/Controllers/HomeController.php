<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TVDict;
use App\TVSerie;
use App\Storedin;
use App\User;
use App\Post;

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
        $data = array('title' => 'User Dashboard');
        return view('home') -> with($data);
    }
}
