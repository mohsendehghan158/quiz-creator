<?php

namespace App\Http\Controllers\Option;

use App\Http\Controllers\Contract\BaseController;
use App\Repositories\Option\OptionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends BaseController
{
    public function __construct()
    {
        parent::__construct(OptionRepository::class);
    }

}
