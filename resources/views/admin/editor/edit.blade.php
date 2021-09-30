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
                            <h4 class="title">Ölçüyə Düzəliş et</h4>
                            <p class="category">{{  $data[0]['name']  }}</p>
                        </div>
                        <div class="card-content">
                            <form enctype="multipart/form-data" method="post" action="{{route('admin.editor.edit.post', ['id' => $data[0]['id']])}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Yazıçı adı</label>
                                            <input value="{{  $data[0]['name']  }}" name="name" type="text" class="form-control">
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Düzənlə</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
