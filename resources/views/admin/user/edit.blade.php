@extends('templates.admin')



@section('left-content')

    <div class="card">
        <div class="card-header">
            ویرایش کاربر
        </div>
        <div class="card-body">
            از طریق فرم زیر میتوانید یک کاربر را ویرایش کنید
            <hr>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('admin-user-update',['user_id'=> $user->id])}}">
                @method('put')
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">نام و نام خانوادگی</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input name="email" type="text" class="form-control" id="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور جدید</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>

                <button type="submit" class="btn btn-primary">ذخیره کاربر</button>
            </form>
        </div>

    </div>


@endsection
