<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
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
        $type = File::mimeType($file);
        //dd($type);

        if ($type == 'image/jpeg')
        {
             $imagename = $profile->id.'image.jpg'; //gives image file name unique to profile id 
        }
        else if ($type == 'image/png')
        {
             $imagename = $profile->id.'image.png';
        }
        else if ($type == 'image/gif')
        {
             $imagename = $profile->id.'image.gif';
        }
        else 
        {
            echo "File type not supported <br /><br />";
            echo "<a href='http://localhost/project_name/public/profiles/{{$profile->id}}/view'>Back</a>";
        }
        
        Storage::put($imagename,file_get_contents($request->file('fileToUpload')->getRealPath()));

        //$profile->image = $imagepath;
        // $imagename = $file->getClient; //gives image file name unique to profile id
        //$contents = Storage::get($imagename);
        
        
        //dd($request->file('fileToUpload'));
        // dd('hit');  // test to see if method accessed
        //dump($request); die;
        //$profile = Profile::find($profile);
        //dump($profile);die;
        
        //Updates Profile database entry
        $profile->image = 'storage/app/public/'.$imagename;
        $profile->update($request->all()); 

        return back();
    }
}