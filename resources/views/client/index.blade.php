@extends('client.master.index')

@section('title')
    {{ $aService['title'] }}
@endsection

@section('content')
    <section class="">
        <div class="baner-header" style="background-image: url({{ img($info['header_baner']) }})">
            <div class="container cover-title">
                <h1 class="text-warning text-center">{!! $info['header_title_1'] !!}</span>
                </h1>
                <h2 class="text-white text-center">{!! $info['header_title_2'] !!}</h2>
                <div class="mt-3 container">
                    <button class="btn btn-outline-secondary text-info d-block m-auto" type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        همه شهرها
                    </button>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                         aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel"> شرکت <span
                                    class="text-danger">{{ $aService['title'] }}</span></h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div>
                                @foreach ($city as $c)
                                    <a style="text-decoration: none" rel="follow" title="{!! $c['title_city'] !!}"
                                       class="text-dark mt-2"
                                       href="{{ route('home.city',[$id,$c['id']]) }}">{!! $c['title_city'] !!}</a><br>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <form method="post" action="">
                        <div class="search-container">
                            <input type="text" name="search" placeholder="جستجو"
                                   class="search-input text-dark">
                            <button class="search-btn" name="send"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <br>

            </div>
        </div>
    </section>


    <section>
        <div class="bge">
            <div class="container bge p-5">
                <h4 class="text-center fs-1 text-primary"> آخرین مقالات</h4>
                <div class="row">
                 @foreach ($blogHome as $b)
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
            </div>

        </div>
    </section>

@endsection
