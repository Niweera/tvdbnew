@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">
                <div class="card-header text-center" style="background-color: #212529;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="navbar-nav mr-auto text-center">
                        <li class="nav-item">
                        <a style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" class="nav-link" href="{{ route('user.index') }}">View Niweera TVDB<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" class="nav-link" href="{{ route('user.create') }}">Insert Data</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
