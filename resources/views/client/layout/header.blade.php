<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta property="og:type" content="company">
<meta name="canonical" content="{{ route('home.index',$id) }}">
<meta property="og:title" content="@yield('og:title')">
<meta property="og:description"
      content="@yield('og:description')" >
<meta property="og:image" content="@yield('og:image')">
<meta property="og:site_name" content="@yield('og:site_name')">
<link rel="icon" type="image/x-icon" href="{{ img($info['logo']) }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="@yield('description')" >
<link rel="stylesheet" href="{{ asset('client/css/index.css') }}"/>
<link rel="stylesheet" href="{{ asset('client/css/form.css') }}"/>
<link rel="stylesheet" href="{{ asset('client/css/bootstrap.rtl.min.css') }}"/>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<script src="{{ asset('client/js/jquery-3.5.1.min.js')}}"></script>
<script src="https://kit.fontawesome.com/cadd94f26e.js"
    crossorigin="anonymous"></script>
<title>@yield('title')</title>
