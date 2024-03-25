@extends('admin.master.index')


@section('title')
    پنل ادمین - آپدیت  کاربر
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
        <form method="post" id="my-form" action="{{ route('user.update',$id) }}">
            @csrf
            @method('put')
            <label class="mt-3 p-2 badge badge-danger">نام کاربر</label>
            <input value="{{ old('name',$user['name']) }}" type="text" name="name" class="form-control mt-1">
            <label class="mt-3 p-2 badge badge-danger">شماره تماس</label>
            <input value="{{ old('phon',$user['phon']) }}" type="text" name="phon" class="form-control mt-1">
            <label class="mt-3 p-2 badge badge-danger">شماره تماس دوم (اختیاری)</label>
            <input value="{{ old('phon2',$user['phon2']) }}" type="text" name="phon2" class="form-control mt-1">
            <button type="submit" class="form-control mt-4 btn btn-success" >ارسال</button>
        </form>
    </div>
@endsection
