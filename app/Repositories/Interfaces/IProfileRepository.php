<?php

namespace App\Repositories\Interfaces;

interface IProfileRepository
{

    public function create($profile);
    public function update($profile);
    public function getProfile();
    public function addImage($image);
}



