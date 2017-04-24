<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function home()
    {
        $people = ['Taylor', 'Matt', 'Jeffrey'];

        return view('welcome')->with(['people' => $people]);
    }

    public function about()
    {
        return view('pages.about'); //resources/views/pages/about.blade.php
    }
}
