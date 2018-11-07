<?php

namespace App\Http\Controllers\Front;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
}
