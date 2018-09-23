@extends('templates.admin')



@section('left-content')

    <div class="card">
        <div class="card-header">
            ایجاد کاربر جدید
        </div>
        <div class="card-body">
            از طریق فرم زیر میتوانید یک کاربر جدید ایجاد کنید
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">نام و نام خانوادگی</label>
                    <input name="name" type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input name="email" type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input name="password" type="text" class="form-control" id="password">
                </div>

                <button type="submit" class="btn btn-primary">ذخیره کاربر</button>
            </form>
        </div>

    </div>


@endsection
