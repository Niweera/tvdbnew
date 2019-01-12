<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TVSerie;
use App\Storedin;
use App\TVDict;

class TVSeriesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = TVSerie::orderBy('tvid','desc')->paginate(10);
        $data = array('title' => 'TVDB User', 'posts' => $posts);
        return view('user.index') -> with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Insert Data');
        return view('user.insert') -> with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,[
            'tvname' => 'required',
            'showtype' => 'required',
            'pid' => 'required',
            'tvfrom' => 'required',
            'tvto' => 'required',
            'link' => 'required'
        ]);
        $post = new TVSerie;
        $post->tvname = $request -> input('tvname');
        $post->showtype = $request -> input('showtype');
        $post->remarks = $request -> input('remarks');
        $post->save();

        $store = new Storedin;
        $store->tvid = $post->tvid;
        $store->pid = $request -> input('pid');
        $store->tvfrom = $request -> input('tvfrom');
        $store->tvto = $request -> input('tvto');
        $store->save();

        $dict = new TVDict;
        $dict->tvid = $post->tvid;
        $dict->link = $request -> input('link');
        $dict->save();

        return redirect('/user')->with('success','New Record added!');


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
    public function destroy($id)
    {
        //
    }
}
