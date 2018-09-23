<?php
/**
 * Created by PhpStorm.
 * User: Mohsen
 * Date: 8/24/2018
 * Time: 7:01 PM
 */

namespace App\Http\Controllers\Contract;


use App\Http\Controllers\Controller;


class BaseController extends Controller
{
    protected $repository;
    protected $data;

    public function __construct($repository)
    {
            $this->repository = !is_null($repository) ? new $repository : null;
            $this->data = [];
    }
}