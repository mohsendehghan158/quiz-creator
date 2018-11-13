@extends('templates.admin')

@section('left-content')
    <div class="card">
        <div class="card-header">
            ایجاد دسته بندی آزمون جدید
        </div>
        <div class="card-body">
            از طریق فرم زیر میتوانید یک دسته بندی برای آزمون های خود ایجاد کنید
            <hr>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    دسته بندی آزمون با موفقیت اضافه گردید
                </div>
            @endif
            @if(session('deleted'))
                <div class="alert alert-success" role="alert">
                    دسته بندی آزمون با موفقیت حذف گردید
                </div>
            @endif
            <form method="post" action="{{route('quiz-category-store')}}" style="margin-top: 20px">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="category_name">نام دسته بندی جدید</label>
                    <input type="text" name="category_name" class="form-control" id="category_name"
                           placeholder="لطفا نام دسته بندی جدید را وارد کنید">
                </div>
                <button type="submit" class="btn btn-primary">ذخیره دسته بندی</button>
            </form>
        </div>

    </div>
    <div class="card" style="margin-top: 20px">
        <div class="card-header">
            دسته بندی های موجود
        </div>
        <div class="card-body">
            دسته بندی های موجود را میتوانید در جدول زیر مشاده کنید
            <hr>
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">نام دسته بندی</th>
                    <th scope="col">عمیلات</th>
                </tr>
                </thead>
                <tbody>
                @if($quizCategories and count($quizCategories)>0)
                    @foreach($quizCategories as $quizCategory)
                        <tr>
                            <th scope="row">{{$quizCategory->quiz_category_name}}</th>
                            <td>
                                <a href="{{route('quiz-category-edit',['category_id'=>$quizCategory->quiz_category_id])}}" class="btn btn-primary"> <span><i class="fas fa-edit"></i> ویرایش </span></a>
                                <a href="{{route('quiz-category-destroy',['category_id'=>$quizCategory->quiz_category_id])}}" class="btn btn-danger remove-button"> <span><i class="fas fa-trash"></i> حذف</span></a>
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>

    </div>
@endsection
