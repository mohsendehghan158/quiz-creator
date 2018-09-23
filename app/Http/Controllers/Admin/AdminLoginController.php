<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Contract\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends BaseController
{
    public function __construct()
    {
        parent::__construct(UserRepository::class);
    }

//    public function login()
//    {
//        return view('admin.login.login');
//    }
//
//    public function doLogin(LoginRequest $request)
//    {
//
//        if ($request->validated()) {
//            $credentials = $request->only('email', 'password');
//            if(Auth::guard('admin')->attempt($credentials)){
//                return redirect()->route('admin-index');
//            }
//        }
//    }

    public function register(Request $request)
    {
        return view('admin.login.register');
    }

    public function doRegister(Request $request)
    {
        $inputs = $request->only('name','email','password');
        $inputs['type'] = User::ADMIN_TYPE;
        $created_admin = $this->repository->create($inputs);
        if($created_admin){
            return redirect()->route('admin-index');
        }

    }

}
