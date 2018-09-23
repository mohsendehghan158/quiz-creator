@extends('templates.admin')


@section('left-content')

    <div class="card">
        <div class="card-header">
            آزمون های موجود
        </div>
        <div class="card-body">
            در زیر می توانید لیستی از آزمون های موجود در سایت را مشاهده کنید
            <hr>
            @if(session('success'))
                <div class="alert alert-success">
                    آزمون مورد نظر شما با موفقیت ایجاد شد
                </div>
            @endif
            @if(session('deleted'))
                <div class="alert alert-success" role="alert">
                    آزمون با موفقیت حذف گردید
                </div>
            @endif

            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">نام آزمون</th>
                    <th scope="col">دسته بندی آزمون</th>
                    <th scope="col">زمان آزمون</th>
                    <th scope="col">وضعیت آزمون</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @if($quizzes and count($quizzes)>0)
                    @foreach($quizzes as $quiz)
                        <tr>
                            <th scope="row">{{$quiz->quiz_name}}</th>
                            <td>{{$quiz->category->quiz_category_name}}</td>
                            <td>{{$quiz->quiz_time}}</td>
                            <td>{{$quiz->quiz_status}}</td>
                            <td>
                                <a href="{{route('edit-quiz',['quiz_id'=>$quiz->quiz_id])}}" class="btn btn-primary"> <span><i class="fas fa-edit"></i> ویرایش </span></a>
                                <a href="{{route('remove-quiz',['quiz_id'=>$quiz->quiz_id])}}" class="btn btn-danger"> <span><i class="fas fa-trash"></i> حذف</span></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
