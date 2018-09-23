@extends('templates.main')

@section('content')
    <div class="card">
        <div class="card-header">
            ویرایش پروفایل کاربری
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <form enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ \Illuminate\Support\Facades\Auth::user()->profile_picture ? asset("storage/images/".\Illuminate\Support\Facades\Auth::user()->profile_picture)  : asset('images/avatar.jpg') }}"
                             class="rounded-circle" width="100" height="100">
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="profile-picture">ویرایش عکس پروفایل کاربری</label>
                            <input type="file" class="form-control-file" name="profile_picture" id="profile-picture">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="name">نام و نام خانوادگی</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="email">پسورد</label>
                    <input type="password" class="form-control" name="password" id="email">
                </div>
                <button type="submit" class="btn btn-primary">ویرایش</button>
                {{csrf_field()}}
            </form>
        </div>
    </div>

@endsection