@extends('templates.main')


@section('content')
    <div class="card">
        <div class="card-header">
            انتخاب آزمون
        </div>
        <div class="card-body">
            از میان آزمون های زیر لطفا یک آزمون را انتخاب کنید
            <hr>
            <form method="post">
                {{csrf_field()}}
                <div class="form-group">
                    @if($quizzes and count($quizzes)>0)
                        <select name="quiz" class="form-control">
                            @foreach($quizzes as $quiz)
                                <option value="{{$quiz->quiz_id}}">{{$quiz->quiz_name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">انتخاب آزمون</button>
            </form>
        </div>
    </div>

@endsection