@extends('templates.admin')



@section('left-content')

    <div class="card">
        <div class="card-header">
            ایجاد آزمون جدید
        </div>
        <div class="card-body">
            از طریق فرم زیر میتوانید یک آزمون جدید ایجاد کنید
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
            <form method="post" action="{{route('quiz-store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="quiz-title">عنوان آزمون</label>
                    <input name="quiz-title" type="text" class="form-control" id="quiz-title">
                </div>
                <div class="form-group">
                    <label for="quiz-category">دسته بندی آزمون</label>
                    <select class="custom-select" name="quiz-category">
                        @if($quizCategories and count($quizCategories)>0)
                            @foreach($quizCategories as $quizCategory)
                                <option value="{{$quizCategory->quiz_category_id}}">{{$quizCategory->quiz_category_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="quiz-time">زمان آزمون</label>
                    <input name="quiz-time" type="text" class="form-control" id="quiz-time">
                    <small>زمانی که کاربران برای پاسخگویی به سوالات وقت دارند را بر حسب دقیقه وارد کنید</small>
                </div>
                <div class="form-group">
                    <label for="quiz-status">وضعیت آزمون</label>
                    <select class="custom-select" name="quiz-status">
                        <option selected value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>

                </div>

                <button type="submit" class="btn btn-primary">ذخیره آزمون</button>
            </form>
        </div>

    </div>


@endsection
