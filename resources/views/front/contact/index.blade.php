@extends('layouts.app')
@section('content')

    <main>
        <section class="contact" id="contact">
            <div class="container">
                <div class="heading text-center">
                    <h2>Bizimlə
                        <span> Əlaqə </span></h2>
                    <p>Hərhansısa bir təklif və ya şikayətiniz varsa aşağıdakı xanaları
                        dolduraraq <br> bizə bir mesaj göndərə bilərsiniz</p>
                </div>
                <div class="row">
                    <div class="col-md-5 no-mobile">
                        <div class="title">
                            <h3>Əlavə məlumat</h3>
                        </div>
                        <div class="content">
                            <!-- Info-1 -->
                            <div class="info">
                                <i class="fas fa-mobile-alt"></i>
                                <h4 class="d-inline-block">Telefon :
                                    <br>
                                    <span>+12457836913 , +12457836913</span></h4>
                            </div>
                            <!-- Info-2 -->
                            <div class="info">
                                <i class="far fa-envelope"></i>
                                <h4 class="d-inline-block">Email :
                                    <br>
                                    <span>example@info.com</span></h4>
                            </div>
                            <!-- Info-3 -->
                            <div class="info">
                                <i class="fas fa-map-marker-alt"></i>
                                <h4 class="d-inline-block">Adres :<br>
                                    <span>6743 last street , Abcd, Xyz</span></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">

                        <form action="{{route('contact.submit',app()->getLocale())}}" enctype="multipart/form-data" method="post" class="sendInfo">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input name="name" type="text" class="form-control" placeholder="Ad">
                                </div>
                                <div class="col-sm-6">
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-sm-12">
                                    <input name="subject" type="text" class="form-control" placeholder="Mövzu">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="5" id="comment" placeholder="Mesaj"></textarea>
                            </div>
                            <button class="btn btn-block" type="submit">Send Now!</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
