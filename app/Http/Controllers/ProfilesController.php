<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));    
    }

    public function show($profileid)
    {
        $profiles = Profile::all();
        $profile = $profiles->find($profileid);
        return view('profiles.show', compact('profile'));
    }
}