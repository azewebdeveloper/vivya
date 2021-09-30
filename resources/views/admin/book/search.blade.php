@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <a class="btn btn-success" href="{{route('admin.book.index')}}">Məhsullar səhifəsinə qayıt</a>
                    </div>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Tapılan Məhsullar</h4>
                            <p class="category">Tapılan məhsulların siyahısı</p>
                        </div>
                        <div class="card-content table-responsive">
                            <div style="margin-bottom: 15px" class="text-right">
                                <input autocomplete="off" placeholder="Search.." id="myInput" type="text">
                            </div>
                            <table id="myTable" class="table">
                                <thead class="text-primary">
                                <th>Ad</th>
                                <th>Düzənlə</th>
                                <th>Sil</th>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{$value['name']}}</td>
                                        <td><a href="{{route('admin.book.edit',['id' => $value['id']])}}"><i class="far fa-edit"></i></a></td>
                                        <td><a href="{{route('admin.book.delete',['id' => $value['id']])}}"><i class="far fa-trash-alt"></i></a></td>
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
