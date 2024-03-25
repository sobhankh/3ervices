@extends('admin.master.index')


@section('title')
    پنل ادمین - ایجاد وبلاگ
@endsection

@section('content')
    <div class="container mt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container">
        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <input type="hidden" value="{!! $id !!}" name="id">
            <label class="mt-2" for="">عنوان ها</label>
            <input value="{!! old('title') !!}" type="text" name="title" class="form-control mt-3" placeholder="عنوان مرورگر">
            <label class="mt-3" for="">چکیده</label>
            <input value="{!! old('description') !!}" type="text" name="description" class="form-control mt-3" placeholder="خلاصه مطلب">
            <label class="mt-3" for="">انتخاب تصویر</label>
            <input type="file" class="form-control mt-2" name="img" accept="image/*">
            <div class="mt-3">
                    <textarea class="mt-3" name="content" id="editor1">
                     {{ old('content') }}
                    </textarea>
            </div>

            <label class="mt-2" for="">کلمات مرتبط</label>
            <input type="text" value="{!! old('tags') !!}" name="tags" placeholder="تگ ها" class="form-control mt-4">
            <label class="mt-2" for="">دسته بندی</label>
            <select name="menu_id" id="" class="form-control mt-3 mb-4">
                @foreach($menus as $m)
                    <option value="{{ $m['id'] }}" >{!! $m['title'] !!}</option>
                @endforeach
            </select>
            <input type="submit" class="form-control mt-3 mb-5 btn btn-success" value="ارسال">
        </form>
    </div>
    </div>
@endsection
