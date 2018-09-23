@extends('templates.main')

@section('content')
    <div class="row">

            @if(session('success'))
            <div class="alert alert-success full-width" role="alert">
                {{ session('success') }}
            </div>
                <a href="{{route('front-quizzes')}}" class="btn btn-primary">مشاهده آزمون ها</a>

            @endif

    </div>

@endsection
