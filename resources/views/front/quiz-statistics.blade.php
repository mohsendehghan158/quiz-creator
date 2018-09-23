@extends('templates.main')

@section('content')

    <div class="card">
        <div class="card-header">
            نتایج آزمون
        </div>
        <div class="card-body">
            <div class="m-3">تعداد جواب های درست :
                <strong>{{$true_answers}}</strong>
            </div>
            <div class="m-3">تعداد جواب های غلط :
                <strong>{{$false_answers}}</strong>
            </div>
            <div class="m-3">درصد آزمون:
                <strong>{{$quiz_percent}}</strong>
                درصد
            </div>
        </div>

    </div>

@endsection
