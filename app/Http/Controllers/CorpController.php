<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorpController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_corp');
    }

    public function index() {
        return view('app-corp');
    }
}
