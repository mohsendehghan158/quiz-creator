<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Contract\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function __construct()
    {
        parent::__construct(null);


    }
    public function index(Request $request)
    {
        return view('admin.index');
    }
}
