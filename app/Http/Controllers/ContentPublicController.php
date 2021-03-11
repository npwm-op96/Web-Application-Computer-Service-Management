<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentPublicController extends Controller
{
    function index()
    {

        $content = array(
            [
            
            "topic"=>"Best CDN providers of 2021 to speed up any website",
            "content"=>"A content delivery network (CDN) works to accelerate almost any website by caching its files in servers around the world. Whether your visitors come from Europe, North America, Asia or anywhere else, content is automatically served from the nearest location for the fastest possible speeds."
            ],
            [
            "topic"=>"Elon Musk Demonstrates Technology Linking Computer to Brain",
            "content"=>"American billionaire Elon Musk has demonstrated a technology designed to use a computer chip inside the head to control the brain.

            During a video demonstration on Friday, Musk provided details about the system, called Neuralink. In addition to leading the Neuralink startup, Musk also heads electric carmaker Tesla and U.S. space company SpaceX."
            ],
            [
            "topic"=>"Printer",
            "content"=>"CMYK genation 2021 "
            ],
            [
            "topic"=>"Printer",
            "content"=>"CMYK genation 2021 "
            ],
            [
            "topic"=>"Printer",
            "content"=>"CMYK genation 2021 "
            ],
            [
            "topic"=>"Printer",
            "content"=>"CMYK genation 2021 "
            ],
        );  
        return view('ContentPublic',compact('content'));
    }
}
