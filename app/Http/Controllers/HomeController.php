<?php

namespace App\Http\Controllers;

use App\Callout;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {

        $callouts = Callout::all();
        return view('home',compact('callouts'));
    }

}
