@extends('templates.admin')


@section('left-content')
    <div class="card">
        <div class="card-header">
            لیست آزمون های موجود
        </div>
        <div class="card-body">
            آزمون مورد نظر خود را برای مدیریت سوالات انتخاب کنید
            <hr>
            <form method="post" action="{{route('create-question-by-quiz-id')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="quiz-category">انتخاب آزمون</label>
                    <select class="custom-select" name="quiz-id">
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
