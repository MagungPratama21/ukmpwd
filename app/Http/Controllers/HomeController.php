<?php

namespace App\Http\Controllers;

use App\Models\Ukm;

class HomeController extends Controller
{
    public function index()
    {
        $ukms = Ukm::all();
        return view('home', compact('ukms'));
    }
}
