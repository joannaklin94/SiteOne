<!DOCTYPE html>
<html lang="en">
<head>
    <title>studypass.app</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

        .navbar-default {
            background-color: #e6f2ff;
            padding: 0% 1% 1% 1%;
        }

        .navbar-nav {
            font-size: medium;
            padding: 2% 0% 1% 0%;
        }

        .sidenav {
            padding-top: 10px;
            background-color: #b3d9ff;
            height: 100%;
        }


    </style>

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="{{asset("/img/weeia.png")}}" class="img-rounded" width="140" height="80"></a>
        </div>
        <ul class="nav navbar-nav">
            @yield('navbar')
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>



</body>
</html>