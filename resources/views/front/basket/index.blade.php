@extends('layouts.app')
@section('content')



    <main>
        <div class="container">
            <div class="row reset-margin manual">
                <div class="col-xl-9">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index',app()->getLocale())}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active">Səbətim</li>
                        </ol>
                    </nav>
                    @if(\App\Helper\basketHelper::allList() != null)
                    <div class="user-cart">
                        <table>
                            <thead>
                            <tr>
                                <th scope="col">Şəkil</th>
                                <th scope="col">Adı</th>
                                <th scope="col">Ölçü</th>
                                <th scope="col">Ədəd</th>
                                <th scope="col">Qiymət</th>
                                <th scope="col">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Helper\basketHelper::allList() as $key => $value)

                                    <tr>
                                        <td data-label="Şəkil">
                                            <img src="{{$value['image']}}" alt="">
                                        </td>
                                        <td data-label="Adı">
                                            <p class="cart-name">{{$value['name']}}</p>
                                        </td>
                                        <td data-label="Ölçü">
                                            <p>{{$value['size']}}</p>
                                        </td>
                                        <td data-label="Ədəd">
                                            <p>{{$value['qty']}}</p>
                                        </td>
                                        <td data-label="Qiymət">
                                            <p>{{$value['price']}} Azn</p>
                                        </td>
                                        <td data-label="Sil">
                                            <p class="cart-delete"><a href="{{route('basket.remove',['id' => $key,app()->getLocale()])}}"><i class="fal fa-trash-alt"></i></a></p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @else
                        <div class="user-cart">
                            <div class="card-body2 card2">
                                <div class="text-center"><img src="{{asset('images/empty-cart1.svg')}}" width="110" height="110" class="mb-2">
                                    <h3><strong>Səbətiniz boşdur</strong></h3>
                                    <h4>Bizi seçdiyiniz üçün təşəkkür edirik ! 😊</h4>
                                    <a href="{{route('index',app()->getLocale())}}" class="goo"><i class="fas fa-arrow-alt-left"></i> Alış-verişə davam et</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-xl-3">
                    <div class="container-fluid cart-price">
                        <div class="row">
                            <div class="col-md-12 cart-parts">
                                <div class="row">
                                    <div class="col-7">
                                        <strong>Cəmi :</strong>
                                    </div>
                                    <div class="col-5 text-right">
                                        <span>{{\App\Helper\basketHelper::totalPrice()}} Azn</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 cart-parts">
                                <div class="row">
                                    <div class="col-7">
                                        <strong>Kupon Endirimi :</strong>
                                    </div>
                                    <div class="col-5 text-right">
                                        <span>0.00 Azn</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 cart-parts">
                                <div class="row">
                                    <div class="col-7">
                                        <strong>Toplam :</strong>
                                    </div>
                                    <div class="col-5 text-right">
                                        <span>{{\App\Helper\basketHelper::totalPrice()}} Azn</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(\App\Helper\basketHelper::countData() > 0)
                        <div class="col-md-12">
                            <div class="order-ok">
                                <a href="{{route('basket.complete',app()->getLocale())}}">Sifarişi tamamla</a>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="order-continue">
                                <a href="{{route('index',app()->getLocale())}}">Alış-verişə davam et</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
