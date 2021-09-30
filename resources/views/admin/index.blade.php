    @extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <a class="btn btn-success" href="{{route('admin.create')}}">Yeni Admin Əlavə et</a>
                    </div>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Adminlər</h4>
                            <p class="category">Bütün adminlərin siyahısı</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Ad</th>
                                <th>Sil</th>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{$value['name']}}</td>
                                        <td>@if(\App\User::all()->count() > 1) <a href="{{route('admin.delete',['id' => $value['id']])}}"><i class="far fa-trash-alt"></i></a> @else --- @endif</td>
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

