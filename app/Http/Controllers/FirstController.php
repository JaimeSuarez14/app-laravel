<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function index()
    {
        //$data = ["name" => "Jaime"];
        //return view('contact', $data);
        $posts = ["post 1", "post 2", "post 3"];
        return view("contact" , compact('posts'));
    }
}
