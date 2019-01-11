<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Home";
        return view('pages.index') -> with('title',$title);
    }
    public function dmca(){
        $title = "DMCA";
        return view('pages.dmca') -> with('title',$title);
    }
    public function help(){
        $title = "Help";
        return view('pages.help') -> with('title',$title);
    }
}
