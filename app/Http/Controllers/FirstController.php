<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    function index()
    {
        $data = ["name" => "Jaime"];
        return view('contact', $data);
    }
}
