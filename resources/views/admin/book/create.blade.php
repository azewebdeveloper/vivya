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
                            <h4 class="title">Məhsul Əlavə et</h4>
                            <p class="category">Zəhmət olmasa xanaları doldurun</p>
                        </div>
                        <div class="card-content">
                            <form enctype="multipart/form-data" method="post" action="{{route('admin.book.create.post')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Məhsul adı</label>
                                            <input name="name" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ölçü</label>
                                            @foreach($editor as $key => $value)
                                                    <input value="{{$value['name']}}" type="checkbox" name="editorid[]"> {{$value['name']}} <br>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Kateqoriya</label>
                                            <select class="form-control" name="categoryid" id="">
                                                @foreach($category as $key => $value)
                                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="">Əsas Şəkil</label>
                                        <div class="form-group label-floating" style="margin-top: 5px">
                                            <input style="opacity: 1 !important; position: inherit !important;" name="image" type="file">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="">Əlavə Şəkillər</label>
                                        <div class="form-group label-floating" style="margin-top: 5px">
                                            <input multiple style="opacity: 1 !important; position: inherit !important;" name="gallery[]" type="file">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Məhsul Qiyməti (köhnə)</label>
                                            <input name="prePrice" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Məhsul Qiyməti (yeni)</label>
                                            <input name="price" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Məhsul Haqqında</label>
                                            <textarea class="form-control" name="description" id="" cols="30" rows="7"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Əlavə et</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
