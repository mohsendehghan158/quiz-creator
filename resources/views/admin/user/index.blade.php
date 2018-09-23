@extends('templates.admin')


@section('left-content')

    <div class="card">
        <div class="card-header">
            کاربران وب سایت
        </div>
        <div class="card-body">
            در زیر می توانید لیستی از کاربران وب سایت را مشاهده کنید
            <hr>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">نام و نام خانوادگی</th>
                    <th scope="col">ایمیل</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @if($users and count($users)>0)
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->name}}</th>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('edit-user',['user_id' => $user->id])}}" class="btn btn-primary"> <span><i class="fas fa-edit"></i> ویرایش </span></a>
                                <a href="{{route('remove-user',['user_id' => $user->id])}}" class="btn btn-danger"> <span><i class="fas fa-trash"></i> حذف</span></a>
                                <a href="{{route('promote-user',['user_id' => $user->id])}}" class="btn btn-primary"> <span><i class="fas fa-award"></i> ارتقای نقش کاربر </span></a>
                            </td>
                            
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
