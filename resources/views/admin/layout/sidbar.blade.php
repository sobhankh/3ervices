<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">خانه</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">تماس</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

        <button class="btn btn-danger text-dark"><a href="{{ route('auth',"301212179") }}">خروج پنل ادمین</a></button>


    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-comments-o"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                حسام موسوی
                                <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">با من تماس بگیر لطفا...</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                پیمان احمدی
                                <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">من پیامتو دریافت کردم</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                سارا وکیلی
                                <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                    <span class="float-left text-muted text-sm">3 دقیقه</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                    <span class="float-left text-muted text-sm">12 ساعت</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                    <span class="float-left text-muted text-sm">2 روز</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                    class="fa fa-th-large"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                </div>
                <div class="info">
                    <a href="#" class="d-block">دانش اسدی</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">


                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                لیست سرویس ها
                                <span class="right badge badge-danger">جدید</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-pie-chart"></i>
                            <p>
                                تولید خدمات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('register.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت خدمات</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                 کاربران
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست کاربران</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>
                                فرم‌ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/forms/general.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اجزا عمومی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/advanced.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>پیشرفته</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/editors.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ویشرایشگر</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-table"></i>
                            <p>
                                جداول
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/tables/simple.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>جداول ساده</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/data.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>جداول داده</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">مثال‌ها</li>
                    <li class="nav-item">
                        <a href="pages/calendar.html" class="nav-link">
                            <i class="nav-icon fa fa-calendar"></i>
                            <p>
                                تقویم
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-envelope-o"></i>
                            <p>
                                ایمیل‌ باکس
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/mailbox/mailbox.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اینباکس</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/compose.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/read-mail.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>خواندن</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                صفحات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>سفارشات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>پروفایل</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/login.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه ورود</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/register.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه عضویت</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/lockscreen.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>قفل صفحه</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-plus-square-o"></i>
                            <p>
                                بیشتر
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/404.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ارور 404</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/500.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ارور 500</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/blank.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه خالی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="starter.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه شروع</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">متفاوت</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>مستندات</p>
                        </a>
                    </li>
                    <li class="nav-header">برچسب‌ها</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-danger"></i>
                            <p class="text">مهم</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-warning"></i>
                            <p>هشدار</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-info"></i>
                            <p>اطلاعات</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
