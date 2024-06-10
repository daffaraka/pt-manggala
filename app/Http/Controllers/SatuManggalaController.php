<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SatuManggalaController extends Controller
{
    public function index()
    {
        return view('satumanggala');
    }
}
