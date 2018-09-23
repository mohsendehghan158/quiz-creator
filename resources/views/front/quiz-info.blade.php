@extends('templates.main')


@section('content')
    <div class="card">
        <div class="card-header">
            اطلاعات آزمون

        </div>
        <div class="card-body">
            در زیر می توانید اطلاعات آزمون را مشاهده کنید
            <hr>
            <div class="m-3">نام آزمون :
            <strong>{{$quiz->quiz_name}}</strong>
            </div>
            <div class="m-3">دسته بندی آزمون :
                <strong>{{$quiz->category->quiz_category_name}}</strong>
            </div>
            <div class="m-3">زمان آزمون :
                <strong>{{$quiz->quiz_time}}</strong>
            </div>
            <div class="m-3">تعداد سوالات :
                <strong>{{$questions_count}}</strong>
            </div>
            <div class="m-3">وضعیت آزمون :
                <strong>{{$quiz->quiz_status}}</strong>
            </div>
            <hr>
            <div class="alert alert-danger">
                با کلیک بر روی شروع، آزمون انتخابی شروع خواهد شد. توجه داشته باشید تا زمانی که بر روی پایان آزمون کلیک نکنید نتیجه برای شما ثبت نخواهد شد
            </div>
            <a href="{{route('do-quiz',['quiz_id' => $quiz->quiz_id])}}"><button class="btn btn-success">شروع آزمون</button></a>


        </div>
    </div>

@endsection