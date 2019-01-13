@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-3" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">Update TV Series Data</h1>
    <div class="jumbotron">
        {!! Form::open(['action' => ['TVSeriesController@update',$posts->tvid], 'method' => 'POST', 'class' => 'mb-4']) !!}
            <div class = "form-group">
                {{Form::label('tvname','TV Name*')}}
                {{Form::text('tvname', $posts->tvname, ['class' => 'form-control', 'placeholder' => 'Enter TV Name'])}}
            </div>
            <div class = "form-group">
                {{Form::label('showtype','Show Type*')}}
                {{Form::select('showtype', ['Airing' => 'Airing', 'Break' => 'Break', 'Completed' => 'Completed'], $posts->showtype,['class' => 'form-control'])}}
            </div>
            <div class = "form-group">
                {{Form::label('remarks','Remarks')}}
                {{Form::text('remarks', $posts->remarks, ['class' => 'form-control', 'placeholder' => 'Enter Remarks'])}}
            </div>
            <div class = "form-group">
                {{Form::label('link','Link')}}
                {{Form::text('link', $link, ['class' => 'form-control', 'placeholder' => 'Enter Wikipedia Link'])}}
            </div>
            <div class="row">
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
                    <div class="col-md-4">
                        <div class = "form-group">
                            {{Form::text('place'.$loop->index, $place->pid, ['class' => 'form-control', 'placeholder' => 'Enter Place','disabled'])}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class = "form-group">
                            {{Form::text('tvfrom'.$loop->index, $place->tvfrom, ['class' => 'form-control', 'placeholder' => 'Enter TV From'])}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class = "form-group">
                            {{Form::text('tvto'.$loop->index, $place->tvto, ['class' => 'form-control', 'placeholder' => 'Enter TV To'])}}
                        </div>
                    </div>
                </div>
                {{Form::hidden('pid'.$loop->index, $place->pid)}}
            @endforeach

            {{Form::hidden('_method',"PUT")}}
            {{Form::hidden('loopcount', $count)}}
            {{Form::submit('Update', ['class' => 'btn btn-dark'])}}

        {!! Form::close() !!}

        {!! Form::open(['action' => ['TVSeriesController@store',$posts->tvid], 'method' => 'POST']) !!}
            <div class="row">
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
            <div class="row">
                <div class="col-md-4">
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
            </div>
            {{Form::hidden('hiddentvid', $posts->tvid)}}
            {{Form::submit('Insert New Place', ['class' => 'btn btn-dark', 'name' => 'btnSubmit'])}}
        {!! Form::close() !!}
    </div>
@endsection