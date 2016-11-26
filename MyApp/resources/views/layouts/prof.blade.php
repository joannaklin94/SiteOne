<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WEIIA') }}</title>


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">



<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>


</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'WEEIA') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="/uploads/{{Auth::user()->avatar}}" class="img-circle" style="width:32px; height:32px; margin:0px 3px;" >
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">

                                <li>
                                    <a href="{{ url('/home') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('home').submit();">
                                        Home
                                    </a>

                                    <form id="home" action="{{ url('/home1') }}" method="GET" style="display: none;"></form>
                                </li>

                                <li>
                                    <a href="{{ url('/profile') }}"   onclick="event.preventDefault();
                                                     document.getElementById('profile').submit();">
                                        My profile
                                    </a>

                                    <form id="profile" action="{{ url('/profile1') }}" method="GET" style="display: none;">
                                    </form>
                                </li>

                                <li>
                                    <a href="{{ url('/topics') }}"   onclick="event.preventDefault();
                                                     document.getElementById('topics').submit();">
                                        My topics
                                    </a>

                                    <form id="topics" action="{{ url('/prof_topics') }}" method="GET" style="display: none;">
                                    </form>
                                </li>

                                <li>
                                    <a href="{{ url('/myads') }}"   onclick="event.preventDefault();
                                                     document.getElementById('myads').submit();">
                                        My ads
                                    </a>

                                    <form id="myads" action="{{ url('/prof_ads') }}" method="GET" style="display: none;">
                                    </form>
                                </li>

                                <li>
                                    <a href="{{ url('/mystudents') }}"   onclick="event.preventDefault();
                                                     document.getElementById('mystudents').submit();">
                                        My students
                                    </a>

                                    <form id="mystudents" action="{{ url('/prof_students') }}" method="GET" style="display: none;">
                                    </form>
                                </li>


                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
