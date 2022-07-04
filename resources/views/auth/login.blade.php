@extends('layouts.app')
@section('content')
<div class="text-center mt-5">
    <main class="form-signin w-100 m-auto">
        <form method="post" action="{{route('login.perform')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"/>
                <label for="floatingInput">Email address</label>
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>


            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>

</div>

@endsection
