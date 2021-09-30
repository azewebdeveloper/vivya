@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <a class="btn btn-success" href="{{route('admin.editor.create')}}">Yeni Ölçü Əlavə et</a>
                    </div>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Ölçülər</h4>
                            <p class="category">Əlavə olunmuş ölçülərin siyahısı</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Ad</th>
                                <th>Düzənlə</th>
                                <th>Sil</th>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{$value['name']}}</td>
                                        <td><a href="{{route('admin.editor.edit',['id' => $value['id']])}}"><i class="far fa-edit"></i></a></td>
                                        <td><a href="{{route('admin.editor.delete',['id' => $value['id']])}}"><i class="far fa-trash-alt"></i></a></td>
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
