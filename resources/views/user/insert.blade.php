@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5 mb-5" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">Insert TV Series Data</h1>
    <div class="jumbotron">
        {!! Form::open(['action' => 'TVSeriesController@store', 'method' => 'POST']) !!}
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('tvname','TV Name*')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::text('tvname', '', ['class' => 'form-control', 'placeholder' => 'Enter TV Name'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('showtype','Show Type*')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::select('showtype', ['Airing' => 'Airing', 'Break' => 'Break', 'Completed' => 'Completed'], 'Airing',['class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('remarks','Remarks')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::text('remarks', '', ['class' => 'form-control', 'placeholder' => 'Enter Remarks'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('link','Link*')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Enter Wikipedia Link'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('pid','Place*')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::select('pid', ['b1' => 'b1', 'b2' => 'b2', 'b3' => 'b3', 'b4' => 'b4', 'b5' => 'b5', 'l' => 'l', 'p' => 'p'], 'l',['class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('tvfrom','TV From*')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::text('tvfrom', '', ['class' => 'form-control', 'placeholder' => 'Enter TV From'])}}
                </div>
            </div>
            <div class="form-row mt-1">
                <div class="col-md-3 col-lg-3 col-sm-12">
                    {{Form::label('tvto','TV To*')}}
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    {{Form::text('tvto', '', ['class' => 'form-control', 'placeholder' => 'Enter TV To'])}}
                </div>
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-dark mt-1', 'name' => 'btnSubmit'])}}

        {!! Form::close() !!}
    </div>
@endsection