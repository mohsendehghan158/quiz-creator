@extends('templates.main')


@section('content')
    <div class="card">
        <div class="card-header">
            {{$quiz->quiz_name}}
        </div>
        <div class="card-body">
            <form method="post" action="{{route('quiz-result')}}">
                <input type="hidden" name="quiz_id" value="{{$quiz->quiz_id}}">
                {{csrf_field()}}
                @if($questions and count($questions))
                    @foreach($questions as $question)

                        <div class="form-group">
                            <div class="alert alert-success mt-2">

                                <strong>
                                    سوال
                                    {{$loop->iteration}}
                                    :
                                </strong>
                                {{$question->question_content}}
                                <input type="hidden" name="questions[]" value="{{$question->question_id}}">
                            </div>
                            @foreach($question->options as $option)
                                <div><input  type="radio" name="correct_option_{{$question->question_id}}" value="{{$option->option_id}}" required>
                                    {{$option->option_content}}
                                </div>
                            @endforeach
                        </div>



            @endforeach
            @endif
                <button type="submit" class="btn btn-primary btn-block">پایان آزمون</button>
            </form>
        </div>
    </div>

@endsection