@extends('layouts.app')
@section('content')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), 'az')}}">AZ</a> <a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), 'en')}}">EN</a>
                    <h3>@lang('page.title')</h3>
                    <div class="heading text-center">
                        <h2>Haqqımızda</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="static_page">
                        <p><strong>Vavawear.az</strong> — Azərbaycanda bir saytda birləşən malların geniş çeşidi
                            bizdədir. A-dan Z-yə
                            kimi sizə lazım olan geyimi tapa bilərsiniz.</p> <br>
                        <span>Seçiminizə yardımçı oluruq</span>
                        <p>
                            Bizim vəzifəmiz yalnız düzgün məhsulu satmaq deyil, həm də alıcını məlumatlandırmaq və
                            maarifləndirməkdir. Sizi maraqlandıran hər-hansı bir məhsul və onun əsas rəqibləri haqqında
                            ətraflı məlumata bələd olduqdan sonra istədiyiniz məhsulun alınmasına qərar verə
                            bilərsiniz.</p> <br>

                        <span>Bizə güvənirlər</span>
                        <p>Başlıca məqsədimiz və əsas iş prinsipimiz, istər pərakəndə müştərilərin, istər isə də
                            təşkilat qismində olan müştərilərin, müştəri məmnuniyyətidir. İstənilən məsələlərin həllində
                            biz daima sizin tərəfinizdəyik, çünki gələcəyimizin 100% siz müştərilərin əlində olduğunu
                            başa düşürük.</p> <br>

                        <span>Seçim rahatlığınız üçün</span>
                        <p>Satılan mallar barədə mümkün qədər faydalı məlumat verməyə çalışırıq. Saytımız texniki
                            xüsusiyyətlərə görə məhsul seçimi üçün asan və effektiv vasitələrlə təchiz edilmişdir. Sayt
                            olaraq, biz,100% uyğun geyim və aksesuar təklif etməyə hazırıq. Məsləhətçilərimiz istənilən
                            suallara cavab verməyə hazırdırlar.</p> <br>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
