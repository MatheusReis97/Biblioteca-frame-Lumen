<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Home extends Controller
{
    public function index ()
    {
        return view('site.home', ['title'=> 'Biblioteca - Home', 'name' => 'Biblioteca']);
    }



}
 