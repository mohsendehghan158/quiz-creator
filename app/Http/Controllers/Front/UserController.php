<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Contract\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\User\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{

    public function __construct()
    {
        parent::__construct(UserRepository::class);
    }
    public function login()
    {
        return view('front.user.user-login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->only('email','password');
        if($request->validated()){
            if(Auth::attempt($credentials)){
                if(Auth::user()->isAdmin()){
                    return redirect()->route('admin-index');
                }
                return redirect()->route('front-quizzes');
            }
        }
    }

    public function register()
    {
        return view('front.user.user-register');
    }

    public function doRegister(RegisterRequest $request)
    {
        $credentials = $request->only('email','password');
        if ($request->validated()) {
                $newUser = $this->repository->create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'type' => User::DEFAULT_TYPE
                ]);
                if($newUser){
                    Auth::attempt($credentials);
                    $request->session()->flash('success','شما با موفقیت در وب سایت عضو شدید');
                    return redirect()->Route('user-register-success');
                }

        }
    }

    public function registerSuccess()
    {
        return view('front.user.user-success-register');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        return view('front.user.user-edit',compact('user'));
    }

    public function doEdit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'profile_picture' => 'required'
        ]);
        extract($request->input());
        $user = $this->repository->find(Auth::user()->id);
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $file = $request->file('profile_picture');
        $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
        $user->profile_picture = $filename;
        $file->storeAs('public/images',$filename);
        $user->save();
        $request->session()->flash('success','کاربر با موفقیت ویرایش شد');
        return redirect()->route('edit-user');
    }


}
