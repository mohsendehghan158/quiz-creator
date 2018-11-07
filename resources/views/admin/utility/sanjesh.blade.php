@extends('templates.admin')


@section('left-content')
    @foreach($titles as $title)
        <div class="card mb-5">
            <div class="card-header">
                {{$title}}
            </div>
        </div>
    @endforeach
@endsection
