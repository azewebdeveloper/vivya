@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Sifariş siyahısı</h4>
                            <p class="category">Gələn sifarişlərin siyahısı</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Sifarişçi</th>
                                <th>Metro</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Adres</th>
                                <th>Ətraflı</th>
                                <th>Status</th>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td> {{$value['name']}}</td>
                                        <td>@if($value['subway'] != null) {{$value['subway']}} @else --- @endif</td>
                                        <td>{{$value['phone']}}</td>
                                        <td>{{$value['email']}}</td>
                                        <td>@if($value['address'] != null) {{$value['address']}} @else --- @endif</td>
                                        <td><a href="{{route('admin.order.detail',['id' => $value['id']])}}"><i class="fas fa-eye"></i></a></td>
                                        @if($value['status'] == null)
                                        <td><a href="{{route('admin.order.delete',['id' => $value['id']])}}"> <small class="ad-status">Yeni</small></a></td>
                                        @else
                                            <td> <span class="ad-okey">Tamamlandı</span></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
