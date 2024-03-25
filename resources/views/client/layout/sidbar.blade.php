<div class="box-content-cities mt-4">
    <h3 class="text-center mt-4">آخرین پست ها</h3>
    <hr>
    <div class="row p-2">
      @foreach ($blog as $pu)
            <div class="col-4 col-md-4">
                <a class="nav-link" title="{{ $pu['title'] }}" href="{{ route('home.blog',[$id , $pu['id']]) }}"><img
                        style="width:100px ; height: 100px;" src="{{ img($pu['img']) }}"
                        width="100" height="100px" alt="{{ $pu['title'] }}"></a>
            </div>
            <div class="col-8 col-md-8 p-2">
                <a class="nav-link" title="{{ $pu['title'] }}" href="{{ route('home.blog',[$id , $pu['id']]) }}">
                    <p class="text-center text-primary">{!! \Illuminate\Support\Str::limit($pu['title'],20) !!}</p>
                </a>
                <span>{!! \Illuminate\Support\Str::limit($pu['content'],30) !!} </span><a class="nav-link"
                                                                                              title="{{ $pu['title'] }}"
                                                                                              href="{{ route('home.blog',[$id , $pu['id']]) }}">
                    <button style="float: left;" class="btn btn-outline-success">ادامه</button>
                </a>
            </div>
            <hr>
        @endforeach
    </div>
</div>
