<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="On this website you can search the well known Niweera TVDB using keywords and check if the required TVSeries is in the TVDB.">
    <meta name="keywords" content="TV Series, Niweera, TVDB, Niwder.me, Niwder, Nipuna, Weerasekara, Nipuna Weerasekara, Niweera">
    <meta name="robots" content="index, follow">
    <meta name="contact" content="w.nipuna@gmail.com">
    <meta name="author" content="Nipuna Weerasekara">
    <link rel="icon" href="{{ url('/') }}/logo.jpg">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ isset($title) ? $title : 'Niweera TVDB' }}</title> --}}
    <title>{{$title}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        .a1 {
            color: #428BCA !important;
            text-decoration: none !important;
        }

        .a1:hover, .a1:focus {
            color: #2A6496 !important;
            text-decoration: underline !important;
        }
        /*=========================
        Icons
        ================= */

        /* footer social icons */
        ul.social-network {
            list-style: none;
            display: inline;
            margin-left:0 !important;
            padding: 0;
        }
        ul.social-network li {
            display: inline;
            margin: 0 5px;
        }


        /* footer social icons */
        .social-network a.icoRss:hover {
            background-color: #F56505;
        }
        .social-network a.icoFacebook:hover {
            background-color:#3B5998;
        }
        .social-network a.icoTwitter:hover {
            background-color:#33ccff;
        }
        .social-network a.icoGoogle:hover {
            background-color:#BD3518;
        }
        .social-network a.icoVimeo:hover {
            background-color:#0590B8;
        }
        .social-network a.icoLinkedin:hover {
            background-color:#007bb7;
        }
        .social-network a.icoRss:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoTwitter:hover i,
        .social-network a.icoGoogle:hover i, .social-network a.icoVimeo:hover i, .social-network a.icoLinkedin:hover i {
            color:#fff;
        }
        a.socialIcon:hover, .socialHoverClass {
            color:#44BCDD;
        }

        .social-circle li a {
            display:inline-block;
            position:relative;
            margin:0 auto 0 auto;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            border-radius:50%;
            text-align:center;
            width: 50px;
            height: 50px;
            font-size:20px;
        }
        .social-circle li i {
            margin:0;
            line-height:50px;
            text-align: center;
        }

        .social-circle li a:hover i, .triggeredHover {
            -moz-transform: rotate(360deg);
            -webkit-transform: rotate(360deg);
            -ms--transform: rotate(360deg);
            transform: rotate(360deg);
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -o-transition: all 0.2s;
            -ms-transition: all 0.2s;
            transition: all 0.2s;
        }
        .social-circle i {
            color: #fff;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -o-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transition: all 0.8s;
        }

        a {
        background-color: #000000;   
        }
    </style>
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container mt-2">
            @include('inc.messages')
            @yield('content')
        </div>
        <footer class="footer fixed-bottom mb-1">
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-5 col-5 text-left">
                    <ul class="social-network social-circle text-center">
                        <li><a href="https://www.facebook.com/Niweera" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-2 col-2"></div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-5 col-5 text-right">
                    <ul class="social-network social-circle text-center">
                        <li><a href="https://twitter.com/Niweera" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>

<script>
$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
    $.ajax({
    url:"{{ route('pages.index.action') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
    }
    })
    }

    $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_customer_data(query);
    });

    fetch_customer_data_user();

    function fetch_customer_data_user(query = '')
    {
    $.ajax({
    url:"{{ route('user.index.action') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
    $('#usertable').html(data.table_data);
    $('#total_records').text(data.total_data);
    }
    })
    }

    $(document).on('keyup', '#usersearch', function(){
    var query = $(this).val();
    fetch_customer_data_user(query);
    });
});
</script>
