@extends('templates.main')


@section('content')

    <div class="row">
        <form method = "post" class="full-width">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">آدرس ایمیل</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="لطفا آدرس ایمیل خود را اینجا وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">رمزعبور</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="رمز عبور خود را اینجا وارد کنید">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me">
                <label class="form-check-label" for="exampleCheck1" >مرا به خاطر بسپار</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">ورود به ناحیه کاربری</button>
        </form>

    </div>
    <div class="row">
        <p style="margin-top: 30px;">
            عضو نیستید؟

                <a href=" <?php echo Route('user-register') ?>"><button class='btn btn-success'>عضویت</button></a>

        </p>
    </div>
@endsection('content')
