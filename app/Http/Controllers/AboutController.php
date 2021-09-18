<?php

namespace App\Http\Controllers;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
   
    public function about()
    {
        return view('views.about');
    }
  
}
