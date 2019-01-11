<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
    $title = "Home";
     return view('pages.index') -> with('title',$title);
    }

    function action(Request $request)
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
         <td>'.$row->tvname.'</td>
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