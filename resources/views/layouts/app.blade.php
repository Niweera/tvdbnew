<!doctype html>
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
        <link rel="icon" href="https://www.niwder.me/tvdb/logo.jpg">
        <title>{{$title}}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <style>
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
        @include('inc.navbar')
        <div class="container">
            @yield('body_content')
            
            <div class="row fixed-bottom mb-2">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <ul class="social-network social-circle text-center">
                        <li><a href="https://www.facebook.com/Niweera" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/Niweera" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/+NipunaWeerasekara" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                    </ul>				
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

        

        <!--JS files needed for bootstrap to work-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
});
</script>
