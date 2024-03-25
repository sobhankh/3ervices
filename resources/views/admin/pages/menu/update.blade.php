@extends('admin.master.index')


@section('title')
    پنل ادمین - آپدیت  {!! $aMenu['title'] !!}
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
        <form method="post" id="my-form" action="{{ route('menus.update',$id) }}">
            @csrf
            @method('put')
            <input type="hidden" name="name_services_id" value="{{ $aMenu['name_services_id'] }}">
            <label class="mt-3 p-2 badge badge-danger">عنوان</label>
            <input value="{!! $aMenu['title'] !!}" type="text" name="title" class="form-control mt-1">
            <label class="mt-3 p-2 badge badge-danger">اولویت (عدد)</label>
            <input value="{!! $aMenu['sort'] !!}" type="number" name="sort" class="form-control mt-1">
            <label class="mt-3 p-2 badge badge-danger">توضیحات  (اختیاری)</label>
            <textarea style="min-height: 200px" name="description" class="form-control">{!! $aMenu['description'] !!}</textarea>
            <button type="submit" class="form-control mt-4 btn btn-success" >ارسال</button>
        </form>
    </div>
@endsection
