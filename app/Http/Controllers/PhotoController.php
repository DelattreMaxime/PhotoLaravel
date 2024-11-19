<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;

class PhotoController extends Controller
{
    function index (){
        return view ('index');
    }

    function albums (){
        return view ('albums');
    }
}