@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5 mb-4" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">TV Series Data</h1>
    <div class="container mt-4 text-center">
        <form>
            <div class="row">
            <div class="col-md-4 col-lg-4"></div>
            <div class="col-md-4 col-lg-4">
                <input type="text" class="form-control" name="search" id="search" aria-describedby="Enter TV Series Name" autocomplete="off" placeholder="Enter TV Series Name">
            </div>
            <div class="col-md-4 col-lg-4"></div>
            </div>
        </form>
    </div>
    <div class="table-responsive mt-4" style="height:626px;overflow-y: scroll;scrollbar-width: none;margin-bottom:33px">
        <table class="table table-dark table-striped">
            <thead class="thead-light">
            <tr>
            <th>TVID</th>
            <th>TVName</th>
            <th>ShowType</th>
            <th>Remarks</th>
            <th>Place</th>
            <th>TVFrom</th>
            <th>TVTo</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

