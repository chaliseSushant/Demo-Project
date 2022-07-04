@extends('layouts.app')
@section('content')
@if(!isset($user_profile))
<div class="text-center mt-5">
    <main class="form-signin w-100 m-auto">
        <form method="post" action="{{url('/profile/save')}}" enctype="multipart/form-data">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Profile Details</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"/>
                <label for="name">Full Name</label>
                @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
                <label for="address">Address</label>
                @if ($errors->has('address'))
                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone Number"/>
                <label for="phone_no">Phone Number</label>
                @if ($errors->has('phone_no'))
                <span class="text-danger text-left">{{ $errors->first('phone_no') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input class="form-control" type="file" id="profile_picture" name="profile_picture">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
        </form>
    </main>

</div>
@else
<div>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{$user_profile->profile_picture}}" class="d-block mx-lg-auto img-fluid" alt="User Profile" width="500" height="400" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">{{$user_profile->name}}</h1>
                <p class="lead">{{$user_profile->address}}</p>
                <p class="lead">{{$user_profile->phone_no}}</p>

            </div>
        </div>
    </div>
</div>
@endif

@endsection
