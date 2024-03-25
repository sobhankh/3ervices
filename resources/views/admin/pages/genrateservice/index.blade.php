@extends('admin.master.index')


@section('title')
ثبت خدمات
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
        <form action="{{ route('register.store') }}" method="post" id="my-form" class="" >
            <div class="row">
                @csrf
                @method('post')
                <div style="margin-top: 1.8rem" class="col-12 col-md-6">
                    <label style="padding: .8rem" class="label-danger d-block p-3">  نام خدمات شهر {city}</label>
                    <input required type="text" placeholder="نام خدمات" class="form-control mt-3" name="service_name">
                </div>
                <div style="margin-top: 1.8rem" class="col-12 col-md-6">
                    <label style="padding: .8rem" class="label-danger d-block p-3">عنوان خدمات</label>
                    <input required type="text" placeholder="عنوان خدمات" class="form-control mt-3" name="title">
                </div>
                <div style="margin-top: 1.8rem" class="col-12 col-md-12">
                    <label style="padding: .8rem" class="label-danger d-block p-3">URL(en)</label>
                    <input required id="hi" type="text" placeholder="URL(en)" class="form-control mt-3" name="slug">
                </div>
            </div>
            <button id="submit-service" type="submit" style="margin-top: 20px" class="btn btn-success form-control">ثبت خدمات</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        alert("hi")
    </script>
@endsection
