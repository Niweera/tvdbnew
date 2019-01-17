@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-3" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">Update TV Series Data</h1>
    <div class="jumbotron pt-4 pb-4">
        {!! Form::open(['action' => ['TVSeriesController@update',$posts->tvid], 'method' => 'POST', 'class' => 'mb-4']) !!}
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('tvname','TV Name')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::text('tvname', $posts->tvname, ['class' => 'form-control', 'placeholder' => 'Enter TV Name'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('showtype','Show Type')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::select('showtype', ['Airing' => 'Airing', 'Break' => 'Break', 'Completed' => 'Completed'], $posts->showtype,['class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('remarks','Remarks')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::text('remarks', $posts->remarks, ['class' => 'form-control', 'placeholder' => 'Enter Remarks'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('link','Link')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::text('link', $link, ['class' => 'form-control', 'placeholder' => 'Enter Wikipedia Link'])}}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class = "form-group">
                        {{Form::label('pid','Place')}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class = "form-group">
                        {{Form::label('tvfrom','TV From')}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class = "form-group">
                        {{Form::label('tvto','TV To')}}
                    </div>
                </div>
            </div>
            @foreach($places as $place)
                <div class="row">
                    <div class="col-md-4 mb-1">
                        {{Form::text('place'.$loop->index, $place->pid, ['class' => 'form-control', 'placeholder' => 'Enter Place','disabled'])}} 
                    </div>
                    <div class="col-md-4 mb-1">
                        {{Form::text('tvfrom'.$loop->index, $place->tvfrom, ['class' => 'form-control', 'placeholder' => 'Enter TV From'])}}
                    </div>
                    <div class="col-md-4 mb-1">                        
                        {{Form::text('tvto'.$loop->index, $place->tvto, ['class' => 'form-control', 'placeholder' => 'Enter TV To'])}}
                    </div>
                </div>
                {{Form::hidden('pid'.$loop->index, $place->pid)}}
            @endforeach

            {{Form::hidden('_method',"PUT")}}
            {{Form::hidden('loopcount', $count)}}
            <div class="row">
                <div class="col-md-2 col-lg-2">
                {{Form::submit('Update Place', ['class' => 'btn btn-dark btn-block mt-2'])}}
                </div>
                <div class="col-md-10 col-lg-10"></div>
            </div>

        {!! Form::close() !!}

        {!! Form::open(['action' => ['TVSeriesController@destroy',$posts->tvid], 'method' => 'POST']) !!}
            <div class="row">
                <div class="col-md-2">
                    {{Form::select('pid', ['b1' => 'b1', 'b2' => 'b2', 'b3' => 'b3', 'b4' => 'b4', 'b5' => 'b5', 'l' => 'l', 'p' => 'p'], 'l',['class' => 'form-control'])}}
                </div>
                <div class="col-md-4">
                    {{Form::text('tvfrom', '', ['class' => 'form-control', 'placeholder' => 'Enter TV From'])}}
                </div>
                <div class="col-md-4">
                    {{Form::text('tvto', '', ['class' => 'form-control', 'placeholder' => 'Enter TV To'])}}
                </div>
                <div class="col-md-2">
                    {{Form::submit('Delete Place', ['class' => 'btn btn-danger btn-block', 'onclick' => "return confirm('Are you sure?')"])}}
                </div>
            </div>
            {{Form::hidden('_method',"DELETE")}}
        {!! Form::close() !!}

        {!! Form::open(['action' => ['TVSeriesController@store',$posts->tvid], 'method' => 'POST']) !!}
            <div class="row mt-3">
                <div class="col-md-2">
                    <div class = "form-group">
                        {{Form::select('pid', ['b1' => 'b1', 'b2' => 'b2', 'b3' => 'b3', 'b4' => 'b4', 'b5' => 'b5', 'l' => 'l', 'p' => 'p'], 'l',['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class = "form-group">
                        {{Form::text('tvfrom', '', ['class' => 'form-control', 'placeholder' => 'Enter TV From'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class = "form-group">
                        {{Form::text('tvto', '', ['class' => 'form-control', 'placeholder' => 'Enter TV To'])}}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class = "form-group">
                        {{Form::submit('Insert New Place', ['class' => 'btn btn-dark btn-block', 'name' => 'btnSubmit'])}}
                    </div>
                </div>
            </div>
            {{Form::hidden('hiddentvid', $posts->tvid)}}
        {!! Form::close() !!}
    </div>
@endsection