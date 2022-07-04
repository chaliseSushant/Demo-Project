<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user_profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('profile',compact('user_profile'));
    }

    public function store(ProfileRequest $request)
    {
        if($request->hasFile('profile_picture'))
        {
            $file = $request->profile_picture;
            $fileName = uniqid().".".$file->getClientOriginalExtension();
            $file->move(storage_path('app/public/images'),$fileName);
        }

        $fillable_array = [
            'name' => $request->name,
            'address'=>$request->address,
            'phone_no'=>$request->phone_no,
            'profile_picture'=>Storage::url('images/'.$fileName),
            'user_id'=>Auth::user()->id
        ];

        $profile = Profile::create($fillable_array);

        return redirect('/profile');
    }
}
