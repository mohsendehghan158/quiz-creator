@extends('templates.admin')

@section('left-content')
    <div class="card">
        <div class="card-header">
            ویرایش سوال
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    سوال با موفقیت ویرایش گردید
                </div>
            @endif
            <div class=" border rounded p-3 m-2">
                <form method="post" action="{{route('edit-question-final')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input name="question_id" type="hidden" value="{{$question->question_id}}">
                        <label for="question_content">متن سوال</label>
                        <input name="question_content" type="text" class="form-control" id="question_content"
                               value="{{$question->question_content}}"
                               required>
                    </div>
                    {{-- start options--}}
                    <label class='d-block'>گزینه های سوال</label>
                    <small>برای انتخاب گزینه درست روی دکمه رادیویی متناظر با آن کلیک کنید</small>
                    @if($options and count($options)>0)
                        @foreach($options as $option)
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="correct_option" value="{{$loop->iteration}}"
                                                   aria-label="Radio button for following text input"
                                            {{$option->option_is_true ? "checked" : ''}}
                                            required
                                            >
                                        </div>
                                    </div>
                                    <input type="text" id="option-{{$loop->iteration}}" name="option-{{$loop->iteration}}" class="form-control"
                                           aria-label="Text input with radio button" required
                                           value="{{$option->option_content}}">
                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{--end options--}}
                    <button type="submit" class="btn btn-primary">ذخیره سوال</button>
                    <span class="final-result ml-2 d-inline-block"></span>

                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
