@extends('layouts.app')

@section('content')
  <div style="margin-top:10px;">
    <div class="container mt-5">
      <h1 class="text-center" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">Search for TV Series using keywords</h1>
    </div>
    <div class="container mt-4 text-center">
      <form>
        <div class="row">
          <div class="col-md-4 col-lg-4"></div>
          <div class="col-md-4 col-lg-4">
            <input type="text" class="form-control" name="search" id="usersearch" aria-describedby="Enter TV Series Name" autocomplete="off" placeholder="Enter TV Series Name">
          </div>
          <div class="col-md-4 col-lg-4"></div>
        </div>
      </form>
    </div>
    <div class="table-responsive mt-4" style="height:290px;overflow-y: scroll;scrollbar-width: none;">
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
          <tbody id="usertable">
    
          </tbody>
        </table>
    </div>
    <div class="jumbotron mt-5" style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">
      <p class="font-weight-bold text-center h2">
          "I must not fear. Fear is the mind-killer. Fear is the little-death that
          brings total obliteration.
          I will face my fear. I will permit it to pass over me and through me.
          And when it has gone past I will turn the inner eye to see its path.
          Where the fear has gone there will be nothing. Only I will remain."
          </p>
    </div>
  </div>
@endsection

