<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    function index (){
        return view ("index");
    }

    function albums (){
        return view ("albums");
    }
}
