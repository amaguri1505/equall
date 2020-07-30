<?php

namespace App\Http\Controllers;

class ViewController extends Controller
{
    public function viewMetaCorp()
    {
        return view('meta-corp');
    }

    public function viewAppCorp()
    {
        return view('app-corp');
    }

    public function viewApp()
    {
        return view('app');
    }
}
