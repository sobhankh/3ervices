@extends('client.master.index')


@section('title')
  {{$aService['title']}} - {{ $blogInfo['title'] }}
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-7">
                @if(empty($err))
                <div class="box-content-cities p-3">
                    <div class="size-img-city">
                        <img src='{{ img($blogInfo['img']) }}' class="size-img-city"
                             alt="{{ $blogInfo['title'] }}"/>
                    </div>
                    <h1 class="mt-3">{{ $blogInfo['title'] }}</h1>
                    <p>{!! $blogInfo['content'] !!}  </p>
                </div>
                @else
                <div class="p-2">
                    <h2 class="text-center alert-danger text-primary p-3">صفحه مورد نظر پیدا نشد</h2>
                </div>
                @endif
            </div>
            <div class="col-12 col-md-5">
                @include('client.layout.sidbar')
            </div>
        </div>
    </div>
@endsection
