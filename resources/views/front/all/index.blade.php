@extends('layouts.app')
@section('content')

    <main>
        <div class="container">
            <div class="row">
                @if($data[0] != null)
                    @foreach($data as $key => $value)
                        <div class="col-lg-3 col-md-4">
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
                    <div class="col-md-12 text-center">
                        {{$data->links()}}
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            Məhsul Tapılmadı
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>

@endsection
