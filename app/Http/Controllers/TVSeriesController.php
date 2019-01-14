<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TVSerie;
use App\Storedin;
use App\TVDict;
use DB;

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
        $posts = DB::table('tvseries')
        ->leftjoin('tvdict', 'tvseries.tvid', '=', 'tvdict.tvid')
        ->select('tvseries.*', 'tvdict.link')
        ->paginate(10);
        foreach ($posts as $post) {
            if(isset($post->link)){
                $tvlink[$post->tvid] = $post->link;
            }
            else{
                $tvlink[$post->tvid] = "https://www.google.com/search?q=".$post->tvname."+TV+Series";
            }
        }
        $data = array('title' => 'View TVDB', 'posts' => $posts, 'tvlink' => $tvlink);
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
        if($request->get('btnSubmit') == 'Submit') {

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
        
        } else if($request->get('btnSubmit') == 'Insert New Place') {
    
            $validate_array = ['pid' => 'required', 'tvfrom' => 'required', 'tvto' => 'required'];
            $this->validate($request, $validate_array);
            
            $store = new Storedin;
            $tvid = $request -> input('hiddentvid');
            $store->tvid = $tvid;
            $store->pid = $request -> input('pid');
            $store->tvfrom = $request -> input('tvfrom');
            $store->tvto = $request -> input('tvto');
            $store->save();
    
            return redirect('/user/'.$tvid.'/edit')->with('success','New Place Record Added!');
    
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
        $post = TVSerie::find($id);
        $link = TVDict::find($id);
        if(!isset($link->link)){
            $tvlink = "";
        }else{
            $tvlink = $link->link;
        }
        $places = DB::table('storedin')->where('tvid', '=', $id)->get()->all();
        $placesCount = DB::table('storedin')->where('tvid', '=', $id)->count();
        $data = array('title' => 'Update TVDB', 'posts' => $post, 'link' => $tvlink, 'places' => $places, 'count' => $placesCount,'stickybottom' => 1);
        return view('user.edit') -> with($data);
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
        $count = $request -> input('loopcount');
        $validate_array = ['tvname' => 'required', 'showtype' => 'required', 'link' => 'required'];
        for($x=0; $x<$count; $x++) {
            $validate_array['tvfrom'. $x] = 'required';
            $validate_array['tvto'. $x] = 'required';
        }
        $this->validate($request, $validate_array);
        $post = TVSerie::find($id);
        $post->tvname = $request -> input('tvname');
        $post->showtype = $request -> input('showtype');
        $post->remarks = $request -> input('remarks');
        $post->save();


        for($x=0; $x<$count; $x++) {
            DB::table('storedin')
            ->where('tvid', 8)
            ->where('pid',$request -> input('pid'. $x))
            ->update(['tvfrom' => $request -> input('tvfrom'. $x),'tvto' => $request -> input('tvto'. $x)]);
        }

        $dict = TVDict::find($id);
        $dict->tvid = $post->tvid;
        $dict->link = $request -> input('link');
        $dict->save();

        return redirect('/user/'.$id.'/edit')->with('success','Record Updated!');
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

    function userAction(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('tvseries')
        ->join('storedin', 'tvseries.tvid', '=', 'storedin.tvid')
        ->select('tvseries.*', 'storedin.*')
        ->where('tvname', 'like', '%'.$query.'%')
        ->get();
      }
      else
      {
       $data = DB::table('tvseries')
        ->join('storedin', 'tvseries.tvid', '=', 'storedin.tvid')
        ->select('tvseries.*', 'storedin.*')
        ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->tvid.'</td>
         <td><a href="'.url('/').'/user/'.$row->tvid.'/edit" style="background-color:transparent;color:white" target="_blank">'.$row->tvname.'</a></td>
         <td>'.$row->showtype.'</td>
         <td>'.$row->remarks.'</td>
         <td>'.$row->pid.'</td>
         <td>'.$row->tvfrom.'</td>
         <td>'.$row->tvto.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="7">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
