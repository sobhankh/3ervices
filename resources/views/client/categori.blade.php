@extends('client.master.index')

@section('title')
    دسته بندی {{ $menuInfo['title'] }} - {{ $aService['title'] }}
@endsection

@section('description')
    {{ $menuInfo['description'] }}
@endsection

@section('content')
    <div class="alert alert-success text-center fs-1 mt-3">
        <h5 style="text-align: center;margin-top: 10px" class="">{{ $menuInfo['title'] }}</h5>
    </div>
    <div class="bge mt-5">
        <div class="container bge p-5">
            <h4 class="text-center"> {{ $menuInfo['title'] }} آخرین مقالات</h4>
            <div class="row">
                @foreach ($blogCate as $b)
                    <div class="col-12 col-md-5 col-lg-3">
                        <div class="parent">
                            <a href="{{ route('home.blog',[$id,$b['id']]) }}">
                                <div class="img">
                                    <img src="{{ img($b['img']) }}" width="100%" alt="{!! $b['title'] !!}"/>
                                </div>
                            </a>
                            <div class="caption-item">
                                <div class="title">
                                    <a class=""
                                       href="{{ route('home.blog',[$id,$b['id']]) }}">{!! $b['title'] !!}</a>
                                </div>
                                <div class="caption">
                                    <p>
                                        {!! \Illuminate\Support\Str::limit($b['content'],200) !!}
                                    </p>
                                </div>
                                <div class="like-item d-linline">
                                    <a class=""
                                       href="{{ route('home.blog',[$id,$b['id']]) }}">
                                        <button class="btn btn-outline-success form-control">
                                            ادامه
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container mt-5 mb-3">
                {{ $blogCate->links() }}
            </div>
        </div>
    </div>
@endsection
