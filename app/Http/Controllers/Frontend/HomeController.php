<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        // $home = Home::first();
        $home = "Application";
        return redirect('/letadminin');
        // return view('frontend.home.index', compact('home'));
    }
}
