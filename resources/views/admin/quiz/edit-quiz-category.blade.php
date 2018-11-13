@extends('templates.admin')

@section('left-content')
    <div class="card">
        <div class="card-header">
            ویرایش دسته بندی آزمون
        </div>
        <div class="card-body">
            از طریق فرم زیر میتوانید یک دسته بندی را ویرایش کنید
            <hr>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    دسته بندی آزمون با موفقیت ویرایش گردید
                </div>
            @endif
            <form method="post" style="margin-top: 20px" action="{{route('quiz-category-update',['quiz_category_id'=>$quiz_category->quiz_category_id])}}">
                @method('put')
                {{csrf_field()}}
                <div class="form-group">
                    <label for="category_name">نام دسته بندی</label>
                    <input type="text" name="category_name" class="form-control" id="category_name"
                           value="{{$quiz_category->quiz_category_name}}">
                </div>
                <button type="submit" class="btn btn-primary">ویرایش دسته بندی</button>
            </form>
        </div>

    </div>
@endsection
