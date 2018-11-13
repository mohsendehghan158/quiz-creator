@extends('templates.admin')


@section('left-content')

    <div class="card">
        <div class="card-header">
            وارد کردن سوالات
            <strong class="quiz_title" data-id="">{{$quiz_title}}</strong>
        </div>

        <div class="card-body question-body">
            @if(session('success'))
                <div class="alert alert-success">
                    سوال با موفقیت حذف گردید
                </div>
            @endif
                @if(session('success_added_question'))
                    <div class="alert alert-success">
                        سوال با موفقیت اضافه گردید
                    </div>
                @endif
            <div class="new-question">
                <div class="question-container border rounded p-3 m-2">
                    <form method="post" action="{{route('question-store')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="quiz_id" value="{{$quiz_id}}">
                        <div class="form-group">
                            <label for="question_content">متن سوال</label>
                            <input name="question_content" type="text" class="form-control" id="question_content"
                                   required>
                        </div>
                        {{-- start options--}}
                        <label class='d-block'>گزینه های سوال</label>
                        <small>برای انتخاب گزینه درست روی دکمه رادیویی متناظر با آن کلیک کنید</small>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="correct_option" value="1"
                                               aria-label="Radio button for following text input" required>
                                    </div>
                                </div>
                                <input type="text" name="option_1" class="form-control"
                                       aria-label="Text input with radio button" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="correct_option" value="2"
                                               aria-label="Radio button for following text input" required>
                                    </div>
                                </div>
                                <input type="text" name="option_2" class="form-control"
                                       aria-label="Text input with radio button" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="correct_option" value="3"
                                               aria-label="Radio button for following text input" required>
                                    </div>
                                </div>
                                <input type="text" name="option_3" class="form-control"
                                       aria-label="Text input with radio button" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="correct_option" value="4"
                                               aria-label="Radio button for following text input" required>
                                    </div>
                                </div>
                                <input type="text" name="option_4" class="form-control"
                                       aria-label="Text input with radio button" required>
                            </div>
                        </div>
                        {{--end options--}}
                        <button type="submit" class="btn btn-primary save-question">ذخیره سوال</button>
                        <span class="final-result ml-2 d-inline-block"></span>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--questions--}}


    <div class="card mt-2">
        <div class="card-header">
            سوالات موجود
        </div>
        <div class="card-body">
            سوالات موجود را میتوانید در جدول زیر مشاهده کنید
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">متن سوال</th>
                    <th scope="col">عمیلات</th>
                </tr>
                </thead>
                <tbody>
                @if($questions and count($questions)>0)
                    @foreach($questions as $question)
                        <tr>
                            <th scope="row">{{$question->question_content}}</th>
                            <td>
                                <a href="{{route('question-edit',['question_id' => $question->question_id])}}" class="btn btn-primary"> <span><i class="fas fa-edit"></i> ویرایش </span></a>
                                <a href="{{route('question-destroy',['question_id' => $question->question_id])}}"
                                   class="btn btn-danger remove-button"> <span><i class="fas fa-trash"></i> حذف</span></a>
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection