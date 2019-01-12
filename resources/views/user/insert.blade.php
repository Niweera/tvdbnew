@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-3" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">Insert TV Series Data</h1>
    <div class="jumbotron">
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
            <div class = "form-group">
                {{Form::label('link','Link')}}
                {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Enter Wikipedia Link'])}}
            </div>
            <div class = "form-group">
                {{Form::label('pid','Place')}}
                {{Form::select('pid', ['b1' => 'b1', 'b2' => 'b2', 'b3' => 'b3', 'b4' => 'b4', 'b5' => 'b5', 'l' => 'l', 'p' => 'p'], 'l',['class' => 'form-control'])}}
            </div>
            <div class = "form-group">
                {{Form::label('tvfrom','TV From')}}
                {{Form::text('tvfrom', '', ['class' => 'form-control', 'placeholder' => 'Enter TV From'])}}
            </div>
            <div class = "form-group">
                {{Form::label('tvto','Remarks')}}
                {{Form::text('tvto', '', ['class' => 'form-control', 'placeholder' => 'Enter TV To'])}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-dark'])}}

        {!! Form::close() !!}
    </div>
@endsection