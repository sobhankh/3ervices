@extends('admin.master.index')


@section('title')
    تولید شهر
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    <div class="container mt-5">
        <h1 class="text-center ">{!! $sNameService['title'] !!}</h1>
        <form id="my-form-data" action="{{ route('genrate.store',$sService) }}" method="post">
            <div class="row">
                @csrf
                @method('post')
                <div style="margin-top: 1.8rem" class="col-12 col-md-12">
                    <label style="padding: 10px" class="label-danger">یک کاربر برای مدیریت پیش قرض انتخاب کنید</label>
                    <select class="form-control" required name="user_id">
                        <option value="">یک کاربر را انتخاب کنید</option>
                        @foreach($aUsers as $sItem)
                            <option value="{{ $sItem['id'] }}">{{$sItem['name']}}  -   {{ $sItem['phon'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button id="submit-service" type="submit" style="margin-top: 20px" class="btn btn-success form-control mt-5">جنریت خدمات</button>
        </form>
    </div>
@endsection
