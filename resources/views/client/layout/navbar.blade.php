<div class="top-menu">
    <div class="container">
        <div class="topbar-right">
            <ul>
                <li>
                    <a class="text-white" href="tel:091---13698"
                    ><i class="fas fa-phone"></i
                        ></a>
                    <span> مشاوره و پشتیبانی واتساپ : 0919------3698</span>
                </li>
                <li>
                    <i class="fa fa-envelope"></i>
                    <span>www.daneshasadi@gmail.com</span>
                </li>
            </ul>
        </div>

        <div class="topbar-left">
            <ul>
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
                <li>
                    <i
                        class="fas fa-search"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                    ></i>
                </li>
                <!-- </button> -->
                <!-- Modal -->
                <div
                    class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Modal title
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="">
                                    <input style="border-radius: 20px;box-shadow: 0 0 10px 0 #000" name="search" type="search" class="form-control bg-light search-modal" placeholder="نام شهر و برند سرچ را کنید">
                                    <button style="margin-top: -20px" class="search-btn btn-success"><i class="fas fa-search text-white"></i>
                                    </button>
                                    <
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>
<header class="header">
    <div class="container">
        <div class="logo">
            <a href="{{ route('home.index',$id) }}"><img src="{{ img($info['logo']) }}"  alt="{{ $aService['title'] }}"/></a>
        </div>
        <div id="hamberger">
            <i class="fas fa-bars"></i>
        </div>
        <nav class="navigation">
            <ul>
                <li><a href="{{ route('home.index',$id) }}">صفحه اصلی</a></li>
                @foreach ($menu as $m)
                    <li><a href="{{ route('home.category',[$id,$m['id']]) }}">{!! $m['title'] !!}</a></li>
                @endforeach
            </ul>
        </nav>
        <span class="signmobile">
          <a> <i class="fas fa-user-lock"></i> </a
          ></span>
    </div>

    <nav class="main-menu">
        <ul>
            <li><a href="{{ route('home.index',$id) }}">صفحه اصلی</a></li>
            @foreach ($menu as $m)
               <li><a href="{{ route('home.category',[$id, $m['id'] ]) }}">{!! $m['title'] !!}</a></li>
            @endforeach
        </ul>
    </nav>
    <div class="container">
    </div>
</header>
<!-- // end header  -->
