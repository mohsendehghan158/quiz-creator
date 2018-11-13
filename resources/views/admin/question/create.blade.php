@extends('templates.admin')


@section('left-content')
    <div class="card">
        <div class="card-header">
            لیست آزمون های موجود
        </div>
        <div class="card-body">
            آزمون مورد نظر خود را برای مدیریت سوالات انتخاب کنید
            <hr>
            <form method="get" action="{{route('question-create')}}">
                <div class="form-group">
                    <label for="quiz-category">انتخاب آزمون</label>
                    <select class="custom-select" name="quiz_id">
                        @if($quizzes and count($quizzes)>0)
                            @foreach($quizzes as $quiz)
                                <option value="{{$quiz->quiz_id}}">{{$quiz->quiz_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">مدیریت سوالات آزمون</button>
            </form>
        </div>
    </div>
@endsection
