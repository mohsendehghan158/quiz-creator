<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Contract\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte;

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

    public function sanjesh()
    {
        $crawler = Goutte::request('GET', 'http://sanjesh.org/');
        $titles = [];
        $crawler->filter('.cnt > h2 > a')->each(function ($node)use(&$titles) {
            $titles[] = $node->text();
        });
        return view('admin.utility.sanjesh',compact('titles'));
    }
}
