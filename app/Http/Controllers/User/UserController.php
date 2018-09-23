<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Contract\BaseController;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct(UserRepository::class);
    }

    public function index()
    {
        $users = $this->repository->all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function createUser(Request $request)
    {
        $inputs = $request->only('name', 'password', 'email');
        $inputs['type'] = 'user';
        $createdUser = $this->repository->create($inputs);
        if ($createdUser) {
            $request->session()->flash('success', 'کاربر با موفقیت اضافه گردید');
            return redirect()->route('users');
        }
    }

    public function edit($user_id)
    {
        $user = $this->repository->find($user_id);
        return view('admin.user.edit', compact('user'));
    }

    public function doEdit($user_id, Request $request)
    {
        $user = $this->repository->find($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password') != null) {
            $user->password = $request->input('password');
        }
        $editedUser = $user->save();
        if ($editedUser) {
            $request->session()->flash('success', 'کاربر با موفقیت ویرایش شد');
            return redirect()->back();
        }
    }

    public function remove($user_id, Request $request)
    {
        $removed_user = $this->repository->delete($user_id);
        $request->session()->flash('success', 'کاربر با موفقیت حذف گردید');
        return redirect()->route('users');

    }
    public function promote($user_id,Request $request)
    {
        $user = $this->repository->find($user_id);
        $user->type = User::ADMIN_TYPE ;
        if($user->save()){
            $request->session()->flash('success','نقش کاربر با موفقیت ارتقا داده شد');
            return redirect()->route('users');
        }
    }


}
