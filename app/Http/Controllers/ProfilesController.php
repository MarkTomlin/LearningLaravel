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

    public function update(Request $request, Profile $profile)
    {
        // dd('hit');  // test to see if method accessed
        //dump($request); die;
        //$profile = Profile::find($profile);
        //dump($profile);die;
        $profile->update($request->all());

        return back();
    }
}