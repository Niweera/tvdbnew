<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white">
        <div class="container">
            <a class="navbar-brand" style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:24px" href="/">Niweera TVDB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @guest
                    <li class="nav-item">
                    <a style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @else
                    <li class="nav-item">
                    <a style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" class="nav-link" href="/home">User Home <span class="sr-only">(current)</span></a>
                    </li>
                    @endguest
                    <li class="nav-item">
                    <a style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" class="nav-link" href="/dmca">DMCA</a>
                    </li>
                    <li class="nav-item">
                    <a style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" class="nav-link" href="/help">Help</a>
                    </li>
                    <li class="nav-item">
                    <a style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" class="nav-link" href="https://www.niwder.me">Blog</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:15px" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-left" style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:20px" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="background-color: #3b3a30;text-shadow: 0 1px 3px rgba(0,0,0,.5);color:white; font-size:15px" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>