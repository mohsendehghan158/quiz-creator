@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                    آزمون ها
                </button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{route('quizzes')}}" >مشاهده لیست آزمون ها</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{route('quiz-create')}}" >ایجاد آزمون جدید</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{route('quiz-categories')}}">مدیریت دسته بندی ها</a> </button>
            </div>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                    سوالات
                </button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{route('quiz-select')}}">مدیریت سوالات آزمون ها</a> </button>
            </div>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                    کاربران
                </button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{route('admin-users-index')}}"> مشاهده لیست کاربران</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{route('admin-user-create')}}">اضافه کردن کاربر جدید</a></button>
            </div>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active">
                    امکانات جانبی
                </button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{route('sanjesh-news')}}">آخرین اخبار سنجش</a></button>
            </div>
        </div>
        <div class="col-sm-9">@yield('left-content')</div>
    </div>


@endsection