@extends('client.master.index')
@section('title') {{ $city['title_city'] }} - {{$aService['title']}} @endsection @section("og:title"){{ $city['title_city'] }} @endsection
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="box-content-cities">
                    @if(!empty($city))
                    <div class="content-cities p-3" style="background: url({{ img($info['city_img']) }});background-size: 100% 100%;height: 400px;">
                        <div class="row">
                            <div style="margin-top: 100px" class="col-12 col-md-12 box-city">
                                <h1 class="text-white text-center fs-3">{{ $city['title_city'] }}</h1>
                            </div>
                        </div>

                    </div>
                    <div class="container alert-light">
                        <div class="">
                            <i class="fa fa-user-circle-o mt-3" aria-hidden="true"></i> : {{ $user['name'] }} <br>
                            <i class="fas fa-phone mt-3"></i> : <a class="text-danger" style="text-decoration: none"
                                                                   href="tel:{{ $user['phon'] }} ">{{ $user['phon'] }} </a>
                            <br>
                            <i class="fa fa-whatsapp mt-2" aria-hidden="true"></i> : <a class="text-danger"
                                                                                        style="text-decoration: none"
                                                                                        href="tel:{{ $user['phon2'] }} ">{{ $user['phon2'] }}</a>
                        </div>
                    </div>
                    <div class="mt-3 container">
                        <button class="btn btn-outline-success text-info d-block m-auto" type="button"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            مناطق مرتبط با {{$city['name']}}
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
                                   @foreach ($data as $c)
                                    <a style="text-decoration: none" rel="follow"
                                       class="text-dark mt-2"
                                       href="{{ route('home.city',[$id,$c['id']]) }}">{{ $c['title_city'] }}</a><br>
                                    <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-5">
                        {!! str_replace("{city}",$city['city_name'],$info['info']) !!}
                    </div>
                    @else
                    <div class="p-2">
                        <h2 class="text-center alert-danger text-primary p-3">شهر مورد نظر پیدا نشد</h2>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-5">
                @include('client.layout.sidbar')
            </div>
        </div>
    </div>


    <br>
@endsection
