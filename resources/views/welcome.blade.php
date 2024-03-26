<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    <title>همه خدمات</title>
</head>
<body>
    <div class="container mt-5">
       <div class="row">
           @foreach($forward as $item)
                <div class="col-12 col-md-4 bg-light">
                    <div class="img-fluid">
                        <a style="text-decoration: none" class="text-white" href="{{ route('home.index',$item['slug']) }}">
                            <img style="width: 100%;height: 200px" src="{{ img($item['img']) }}">
                        </a>
                    </div>
                    <div class="text-dark">
                        <p class="text-center fs-3 mt-2">{{ $item['title'] }}</p>
                    </div>
                    <button class="form-control btn btn-success"><a style="text-decoration: none" class="text-white" href="{{ route('home.index',$item['slug']) }}">بازدید سایت</a></button>
                </div>
           @endforeach
       </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
