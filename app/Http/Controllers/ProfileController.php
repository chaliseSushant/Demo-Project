<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use App\Repositories\Interfaces\IProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    private $profileRepository;

    public function __construct(IProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
    public function index()
    {
        $user_profile = $this->profileRepository->getProfile();
        return view('profile',compact('user_profile'));
    }

    public function store(ProfileRequest $request)
    {
        $user_profile = $this->profileRepository->create($request);
        return redirect('/profile')->with('profile',$user_profile);
    }

    public function update(ProfileRequest $request)
    {
        $user_profile = $this->profileRepository->update($request);
        return redirect('/profile')->with('profile',$user_profile);
    }
}
