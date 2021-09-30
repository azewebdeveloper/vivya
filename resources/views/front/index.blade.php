@extends('layouts.app')
@section('content')



    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="products_title">
                        <h4>Ən çox <span>baxılanlar</span></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel main_products owl-theme">
                        @foreach(\App\Book::orderBy('viewer','desc')->take(10)->get() as $key => $value)
                        <div class="item">
                            <a class="products" href="{{route('front.single', [app()->getLocale(), 'selflink' => $value['selflink']])}}">
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

                <div class="col-md-12">
                    <div class="products_title products_title_2">
                        <h4><span>Endirimli</span> məhsullar</h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel main_products owl-theme">
                        @foreach(\App\Book::where('prePrice','!=','null')->take(10)->get() as $key => $value)
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
