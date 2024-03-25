@extends('admin.master.index')


@section('title')
    مدیریت خدمات {!! $service['title'] !!}
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

        <form id="my-form" method="post" action="{{ route('mangment.update',$service['slug']) }}">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <div style="margin-top: 1.8rem" class="col-12 col-md-12">
                @method('post')
                @csrf
                <label style="padding: 10px" class="label-danger">نام استان</label>
                <select  class="form-control m-2" onchange="getCity()"  id="ostan" required name="province_id">
                    <option value="">یک استان انتخاب کنید</option>
                    @foreach($aProvinces as $sItem)
                        <option value="{{ $sItem['id'] }}">{{$sItem['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div style="margin-top: 1.8rem" class="col-12 col-md-12">
                <label  style="padding: 10px" class="label-danger">نام شهر</label>
                <select id="city"  class="form-control" style="font-size: 12px"  required name="citiey_id">

                </select>
            </div>
            <div style="margin-top: 1.8rem" class="col-12 col-md-12">
                <label  style="padding: 10px" class="label-danger">نام کاربر</label>
                <select id="user" class="form-control m-2" class="form-control" style="font-size: 12px"  required name="user_id">
                    <option value="">یک کاربر انتخاب کنید</option>
                    @foreach($aUsers as $user)
                        <option value="{{ $user['id'] }}">{!! $user['name'] !!} - {!! $user['phon'] !!}</option>
                    @endforeach
                </select>
            </div>
            <button id="submit-service" type="submit" style="margin-top: 20px" class="btn btn-success form-control">تغیر نمایندگی خدمات</button>
        </form>
    </div>

    <script>
        function getCity(){

            iId = $("#ostan").val();

            $.ajax({
                type: "POST",
                url: "{{ route('get.city') }}",
                data: {
                     id : iId,
                    _method: "post",
                    _token : "{{ csrf_token() }}",
                },
            }).done(function (data) {
                $("#city").html(data);
                $("#city").append("<option value='all' selected>همه شهر ها</option>");
            });
        }
    </script>




@endsection
