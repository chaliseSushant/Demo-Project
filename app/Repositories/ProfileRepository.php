<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\Interfaces\IProfileRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileRepository implements IProfileRepository
{


    public function create($profile)
    {

        $fillable_array = [
            'name' => $profile->name,
            'address'=>$profile->address,
            'phone_no'=>$profile->phone_no,
            'profile_picture'=>Storage::url('images/'.$this->addImage($profile->profile_picture)),
            'user_id'=>Auth::user()->id
        ];

        $profile = Profile::create($fillable_array);
        return $profile;
    }

    public function update($profile)
    {

        $profile_picture = $profile->hasFile('profile_picture')?$this->addImage($profile->profile_picture):$this->getProfile()->profile_picture;
        $fillable_array = [
            'name' => $profile->name,
            'address'=>$profile->address,
            'phone_no'=>$profile->phone_no,
            'profile_picture'=>Storage::url('images/'.$profile_picture),
            'user_id'=>Auth::user()->id
        ];

        $updated_profile = Profile::where('id',$profile->id)->update($fillable_array);
        return $updated_profile;
    }

    public function getProfile()
    {
        return Profile::where('user_id',Auth::user()->id)->first();
    }

    public function addImage($image)
    {
        $file = $image;
        $fileName = uniqid().".".$file->getClientOriginalExtension();
        $file->move(storage_path('app/public/images'),$fileName);
        return $fileName;
    }

}

