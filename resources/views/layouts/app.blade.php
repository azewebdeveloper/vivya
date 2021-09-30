<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vavawear.az | Kişi geyimlərinin satışı</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('page_css/all.min.css')}}">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('page_css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('page_css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('page_css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('page_css/swiper.bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('page_css/style.css')}}">
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-1 mob-icon">
                <div>
                    <i class="fal fa-bars"></i>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-7">
                <a href="{{route('index')}}">
                    <div class="site_logo">
                        <img src="{{asset('images/logo.png')}}" alt="">
                    </div>
                    <div class="site_name">
                        <p>Vavawear. <span>az</span></p>
                        <small>- The best in Baku</small>
                    </div>
                </a>
            </div>
            <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ' /lang/az')}}">AZ</a> <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), '/lang/en')}}">EN</a>
            <h3>@lang('page.title')</h3>
            <div class="col-lg-2 col-md-3 col-4 no-pc">
                <div class="basket">
                    <a href="{{route('basket.index')}}">
                        <div class="basket_icon">
                            <i class="fal fa-shopping-cart"></i>
                            <h6>{{\App\Helper\basketHelper::countData()}}</h6>
                        </div>
                        <span>Səbətim</span>
                        <small>{{\App\Helper\basketHelper::totalPrice()}} Azn</small>
                    </a>
                </div>
            </div>
                     <div class="col-lg-2 col-md-3 no-mobile">
                <div class="basket">
                    <a href="{{route('basket.index')}}">
                        <div class="basket_icon">
                            <i class="fal fa-shopping-cart"></i>
                            <h6>{{\App\Helper\basketHelper::countData()}}</h6>
                        </div>
                        <span>Səbətim</span>
                        <small>{{\App\Helper\basketHelper::totalPrice()}} Azn</small>
                    </a>
                </div>
            </div>
            <div class="col-md-12 main-menu">
                <ul class="list-unstyled list-inline menu">
                    <li class="list-inline-item"><a href="{{route('index')}}">Ana Səhifə</a></li>
                    <li class="list-inline-item"><a href="{{route('all.index')}}">Bütün Məhsullar</a></li>
                    <li class="list-inline-item"><a href="{{route('all.discount')}}">Endirimli Məhsullar</a></li>
                    <li class="list-inline-item"><a href="{{route('about.index')}}">Haqqımızda</a></li>
                    <li class="list-inline-item"><a href="{{route('contact.index')}}">Əlaqə</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="left-menu">
        <ul class="list-unstyled">
            <div class="close-menu"><i class="fas fa-times"></i></div>
            <li><a href="{{route('index')}}">Ana Səhifə</a></li>
            <li><a href="{{route('all.index')}}">Bütün Məhsullar</a></li>
            <li><a href="{{route('all.discount')}}">Endirimli Məhsullar</a></li>
            <li><a href="{{route('about.index')}}">Haqqımızda</a></li>
            <li><a href="{{route('contact.index')}}">Əlaqə</a></li>
        </ul>
    </div>
</header>
@yield('content')


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 foot-title">
                <h3 class="text-center mt-3">Üstünlüklərimiz</h3>
            </div>
            <div class="col-md-3 col-6">
                <div class="inform">
                    <i class="fas fa-shield-alt"></i>
                    <h6>100% keyfiyyətli məhsullar</h6>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="inform">
                    <i class="fas fa-usd-circle"></i>
                    <h6>Ən sərfəli qiymətlər bizdə</h6>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="inform">
                    <i class="fas fa-rocket-launch"></i>
                    <h6>Sürətli çatdırılma (6-72 saat)</h6>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="inform">
                    <i class="far fa-undo"></i>
                    <h6>3 gün ərzində dəyişmə imkanı</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid page_end">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <p>Copyright © 2021, Bütün huquqları qorunur.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-right">
                        <p>Created by <a target="_blank" style="margin-left: 3px" href="https://alihuseynli.com">Əli Huseynli</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('page_js/Jquery.js')}}"></script>
<script src="{{asset('page_js/bootstrap.min.js')}}"></script>
<script src="{{asset('page_js/owl.carousel.min.js')}}"></script>
<script src="{{asset('page_js/swiper.bundle.min.js')}}"></script>
<script src="{{asset('page_js/core.js')}}"></script>
</body>
</html>
