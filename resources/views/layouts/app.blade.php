<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <title>Demo Project</title>
</head>
<body>
<div>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                    @auth
                    <li><a href="/profile" class="nav-link px-2 text-white">Profile</a></li>
                    @endauth

                </ul>

                @if(Auth::check())
                <label> {{auth()->user()->name}}</label>
                <div class="text-end">

                    <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
                @else
                <div class="text-end">
                    <a type="button" href="{{route('login.show')}}" class="btn btn-outline-light me-2">Login</a>
                    <a type="button" href="{{route('register.show')}}" class="btn btn-warning">Sign-up</a>
                </div>
                @endif
            </div>
        </div>
    </header>
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>
