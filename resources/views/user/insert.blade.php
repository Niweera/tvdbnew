@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">Insert TV Series Data</h1>
    <div class="jumbotron mt-5">
        {!! Form::open(['action' => 'TVSeriesController@store', 'method' => 'POST']) !!}
            <div class = "form-group">
                {{Form::label('tvname','TV Name*')}}
                {{Form::text('tvname', '', ['class' => 'form-control', 'placeholder' => 'Enter TV Name'])}}
            </div>
            <div class = "form-group">
                {{Form::label('showtype','Show Type*')}}
                {{Form::select('showtype', ['Airing' => 'Airing', 'Break' => 'Break', 'Completed' => 'Completed'], 'Airing',['class' => 'form-control'])}}
            </div>
            <div class = "form-group">
                {{Form::label('remarks','Remarks')}}
                {{Form::text('remarks', '', ['class' => 'form-control', 'placeholder' => 'Enter Remarks'])}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-dark'])}}

        {!! Form::close() !!}
    </div>
@endsection