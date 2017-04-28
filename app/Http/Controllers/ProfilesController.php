<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

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
        $file =$request->file('fileToUpload');

        Storage::put('file_test.jpg',$file);

        //$profile->image = $imagepath;
       
        $contents = Storage::get('file_test.jpg');
        //dd($request->file('fileToUpload'));
        // dd('hit');  // test to see if method accessed
        //dump($request); die;
        //$profile = Profile::find($profile);
        //dump($profile);die;
        
        //Set profile image to image path 
        //$profile->image = "images/". basename( $_FILES["fileToUpload"]["name"]); 
        //Updates Profile database entry
        $profile->image = $contents;
        $profile->update($request->all()); 

        return back();
    }
}