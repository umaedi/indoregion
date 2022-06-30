<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndoregionController extends Controller
{
    public function provinsi()
    {
        return view('frontend.indoregion');
    }
}
