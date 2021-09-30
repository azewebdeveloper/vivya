@extends('layouts.app')
@section('content')



    <div class="container">
        <form method="post" action="{{route('basket.completeStore',app()->getLocale())}}" class="orders">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index',app()->getLocale())}}">Ana səhifə</a></li>
                            <li class="breadcrumb-item active">Sifarişi tamamla</li>
                        </ol>
                    </nav>
                </div>
                @if(session('status'))
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        {{session('status')}}
                    </div>
                </div>
                @endif


                    <div class="input-group-icon col-md-6">
                        @error('name')
                        <small class="err">{{$message}}</small>
                        @enderror
                        <input required name="name" type="text" placeholder="Adınız və soyadınız"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>

                    </div>
                    <div class="input-group-icon col-md-6">
                        <input name="email" type="email" placeholder="Email adresiniz"/>
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    </div>
                    <div class="input-group-icon col-md-6">
                        @error('phone')
                        <small class="err">{{$message}}</small>
                        @enderror
                        <input required name="phone" type="text" placeholder="Telefon"/>
                        <div class="input-icon"><i class="fas fa-mobile-alt"></i></div>
                    </div>

                    <div class="input-group-icon col-md-6">
                        <input id="subway" name="subway" type="text" placeholder="Çatdırılacaq metro"/>
                        <div class="input-icon"><i class="fas fa-subway"></i></div>
                    </div>
                    <div class=" input-group-icon col-md-12">
                        <div class="input-group">
                            <input hidden type="checkbox" id="terms"/>
                            <label class="termsId" for="terms">Ünvana çatdırılma (Ödənişli). Qiymət ünvana görə
                                dəyişir</label>
                        </div>
                    </div>
                    <div id="address" class=" input-group-icon col-md-12">
                        <input name="address" id="adres" type="text" placeholder="Ünvan"/>
                        <div class="input-icon"><i class="fas fa-map-marker-alt"></i></div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button class="sendOrder" type="submit">Sifarişi Tamamla</button>
                    </div>
            </div>
        </form>
    </div>

@endsection
