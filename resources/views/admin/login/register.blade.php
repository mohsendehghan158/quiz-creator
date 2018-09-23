@extends('templates.main')

@section('content')
    <form method = "post" class="full-width">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">نام و نام خانوادگی</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">ایمیل</label>
            <input name="email" type="email" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label  for="passwordfield">پسورد</label>
            <input name="password" type="password" class="form-control" id="passwordfield">


        </div>
        <button type="submit" class="btn btn-primary btn-block">عضویت در وب سایت</button>
    </form>

@endsection
