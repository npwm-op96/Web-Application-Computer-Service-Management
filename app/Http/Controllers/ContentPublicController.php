<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentPublicController extends Controller
{
    function index()
    {
        return view('ContentPublic');
    }
}
