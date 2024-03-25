@extends('admin.master.index')

@section('title')
    ادمین پنل -  آپدیت خدمات {!! $aSerice['title'] !!}
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('services.update',$aInfoService['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div id="data-container" class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img class="mt-5" src="{{ url( $aInfoService['logo'] ) }}" width="100%" height="200" >
                        <label  style="padding: 10px" class="label-danger mt-5">logo</label>
                        <input   type="file"  class="form-control" name="logo" accept="image/*">
                    </div>
                    <div class="col-12 col-md-6">
                        <img class="mt-5" src="{{ url( $aInfoService['header_baner'] ) }}" width="100%" height="200" >
                        <label  style="padding: 10px" class="label-danger mt-5">بنر سایت</label>
                        <input  type="file" class="form-control"  name="header_baner" accept="image/*">
                    </div>
                    <div class="col-12 col-md-12">
                        <img class="mt-5" src="{{ url( $aInfoService['city_img'] ) }}" width="100%" height="200" >
                        <label  style="padding: 10px" class="label-danger mt-5">عکس تبلیغ خدمات شهر ها</label>
                        <input  type="file" class="form-control"  name="city_img" accept="image/*">
                    </div>
                </div>
                <div class="row">
                    <div style="margin-top: 20px" class="col-12 col-md-6">
                        <label  style="padding: 10px" class="label-danger mt-5">عنوان اول h1</label>
                        <input value="{{ $aInfoService['header_title_1'] }}" required id="header_title_1" type="text" class="form-control" name="header_title_1" placeholder="عنوان اول h1">
                    </div>
                    <div style="margin-top: 20px" class="col-12 col-md-6">
                        <label  style="padding: 10px" class="label-danger mt-5">عنوان دوم h2</label>
                        <input value="{{ $aInfoService['header_title_2'] }}" type="text" id="header_title_2" class="form-control" name="header_title_2" placeholder="عنوان دوم h1">
                    </div>
                    <div style="margin-top: 20px" class="col-12 col-md-6">
                        <label  style="padding: 10px" class="label-danger mt-5">عنوان فوتر</label>
                        <input value="{{ $aInfoService['footer_title'] }}" type="text" id="footer_title" class="form-control" name="footer_title" placeholder="عنوان فوتر">
                    </div>
                    <div style="margin-top: 20px" class="col-12 col-md-6">
                        <label  style="padding: 10px" class="label-danger mt-5">توضیحات فوتر</label>
                        <textarea class="form-control" id="footer_description" name="footer_description">{{ $aInfoService['footer_description'] }}</textarea>
                    </div>
                </div>
                <div style="margin-top: 20px" class="col-12 col-md-12">
                    <label  style="padding: 10px" class="label-danger mt-5">مقاله شهرها {city}</label>
                    <textarea name="info" required id="editor1">{{ $aInfoService['info'] }}</textarea>
                </div>
                <button id="btn-submit-form" style="margin-top: 20px" type="submit" class="form-control mt-4 btn btn-success">ارسال</button>
            </div>
        </form>
    </div>
@endsection


