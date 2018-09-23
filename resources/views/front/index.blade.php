@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">به وب سایت برگزاری آزمون آنلاین خوش آمدید</h5>
                    <p class="card-text">جهت شرکت در آزمون ها ابتدا وارد شوید یا ثبت نام کنید</p>
                    <a href="<?php echo Route('login') ?>" class="btn btn-primary">ورود</a>
                    <a href="<?php echo Route('user-register') ?>" class="btn btn-primary">عضویت</a>
                </div>
            </div>
        </div>
    </div>
@endsection