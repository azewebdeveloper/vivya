@extends('layouts.app')
@section('content')
    <main>
        <div class="container">

            <div class="product-main">

                <div class="product-content">
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index',app()->getLocale())}}">Ana Səhifə</a></li>

                                    <li class="breadcrumb-item"><a
                                            href="">{{\App\Category::getField($data[0]['categoryid'],'name')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$data[0]['name']}}</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="product-media col-lg-4">
                            <div class="product-image">
                                <img class="active" src="{{asset(\App\Helper\mHelper::singleImage($data[0]['image']))}}"
                                     alt="...">
                            </div>

                            <div class="product-thumb">
                                @if($data[0]['gallery'] != null)
                                    @php
                                    $getImages = json_decode($data[0]['gallery'])
                                    @endphp
                                    @foreach($getImages as $key => $vaule)
                                <div class="thumb-item">
                                    <img
                                        src="{{asset($vaule)}}"
                                        alt="...">
                                </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="product-desc col-lg-8">

                            <div class="desc-header">

                                <h1>{{$data[0]['name']}}</h1>

                                <div class="price">
                                    @if($data[0]['prePrice'] != null)
                                        <span class="price-old">{{$data[0]['prePrice']}} Azn</span>
                                    @endif
                                    <span class="price-new">{{$data[0]['price']}} Azn</span>
                                </div>
                            </div>

                            <div class="desc-content">
						<span>
							<h6>Məhsul haqqında</h6>
                            <p>{{$data[0]['description']}}</p>
						</span>
                            </div>

                            <div class="product-type">


                                <form method="GET" class="single_basket" action="{{route('basket.add',[app()->getLocale(),'id'=> $data[0]['id']])}}">
                                    <div class="item product-type-qty">
                                        <label for="product-type-size">Ölçü</label>
                                        <select id="product-type-size" name="editorid">
                                            @foreach(\App\Book::where('id','=', $data[0]['id'])->get() as $key => $value)
                                                @php
                                                    $size = json_decode($value['editorid'])
                                                @endphp
                                                @foreach($size as $key => $val)
                                                    <option value="{{$val}}">{{$val}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="item product-type-qty">
                                        <label for="product-type-qty">Miqdarı</label>
                                        <input value="1" maxlength="2" class="product-qty" name="qty"
                                               id="product-type-qty" type="number">
                                    </div>
                                    <button type="submit"><i class="fal fa-shopping-cart"></i> <span>Səbətə at</span></button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="products_title text-center mt-3">
                        <h4>Oxşar <span>məhsullar</span></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel main_products owl-theme">
                        @foreach(\App\Book::inRandomOrder()->limit(10)->get() as $key => $value)
                            <div class="item">
                                <a class="products" href="{{route('front.single', [app()->getLocale(),'selflink' => $value['selflink']])}}">
                                    <img src="{{asset($value['image'])}}" alt="">
                                    <div class="products_name">
                                        <p>{{$value['name']}}</p>
                                        @if($value['prePrice'] != null)
                                            <del>{{$value['prePrice']}} Azn</del>
                                        @endif
                                        <mark>{{$value['price']}} Azn</mark>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
