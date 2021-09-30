@extends('layouts.admin')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if(session('status'))
                        <div class="alert alert-primary">
                            {{session('status')}}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Sifariş haqqında</h4>
                        </div>
                        <div class="card-content">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label"><strong style="margin-right: 15px">Sifarişçi:</strong> {{$data[0]['name']}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label"><strong style="margin-right: 15px">Telefon:</strong> {{$data[0]['phone']}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label"><strong style="margin-right: 15px">Email:</strong> {{$data[0]['email']}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label"><strong style="margin-right: 15px">Metro:</strong> @if($data[0]['subway'] != null) {{$data[0]['subway']}} @else Qeyd olunmayıb @endif</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label"><strong style="margin-right: 15px">Adres:</strong> @if($data[0]['address'] != null) {{$data[0]['address']}} @else Qeyd olunmayıb @endif</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <h4 class="ad-title">Sifariş etdiyi məhsullar</h4>
                                        </div>
                                    </div>
                                    @foreach(json_decode($data[0]['json'],true) as $key => $value)
                                        <div class="col-md-12">

                                            <div class="form-group" style="border: 1px solid #2bf12b;padding: 15px;padding-top: 5px;">
                                                <label  class="control-label"><strong style="margin-right: 15px">Məhsulun Şəkli:</strong>
                                                    <br>
                                                    <img style="width: 100px;height: 100px; margin-top: 10px" src="{{asset($value['image'])}}" alt=""></label>
                                                <br>
                                                <label class="control-label"><strong style="margin-right: 15px">Məhsulun Adı:</strong> {{$value['name']}}</label>
                                                <br>
                                                <label class="control-label"><strong style="margin-right: 15px">Məhsulun ölçüsü:</strong> {{$value['size']}}</label>
                                                <br>
                                                <label class="control-label"><strong style="margin-right: 15px">Məhsulun qiyməti:</strong> {{$value['price'] / $value['qty']}} Azn</label>
                                                <br>
                                                <label class="control-label"><strong style="margin-right: 15px">Məhsulun ədədi:</strong> {{$value['qty']}} Ədəd</label>
                                                <br>
                                                <label class="control-label"><strong style="margin-right: 15px">Toplam:</strong> {{$value['price']}} Azn</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
