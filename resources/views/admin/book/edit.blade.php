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
                            <h4 class="title">Kitab Düzənlə</h4>
                            <p class="category">{{$data[0]['name']}}</p>
                        </div>
                        <div class="card-content">
                            <form enctype="multipart/form-data" method="post" action="{{route('admin.book.edit.post', ['id' => $data[0]['id']])}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Kitab adı</label>
                                            <input value="{{$data[0]['name']}}" name="name" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Kateqoriya</label>
                                            <select class="form-control" name="categoryid" id="">
                                                @foreach($category as $key => $value)
                                                    <option @if($value['id'] == $data[0]['categoryid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Yazıçının adı</label>
                                            <select class="form-control" name="editorid" id="">
                                                @foreach($editor as $key => $value)
                                                    <option @if($value['id'] == $data[0]['editorid']) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            @if($data[0]['image'] != '')
                                                <img style="width: 120px;height: 120px; margin-bottom: 15px" src="{{asset($data[0]['image'])}}" alt="">
                                            @endif
                                            <input style="opacity: 1 !important; position: inherit !important;" name="image" type="file">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            @if($data[0]['gallery'] != '')
                                                @php
                                                $gallery = json_decode($data[0]['gallery'])
                                                @endphp
                                                @foreach($gallery as $key => $value)
                                                <img style="width: 120px;height: 120px; margin-bottom: 15px" src="{{asset($value)}}" alt="">
                                                @endforeach
                                            @endif
                                            <input multiple style="opacity: 1 !important; position: inherit !important;" name="gallery[]" type="file">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Kitab Qiyməti</label>
                                            <input value="{{$data[0]['price']}}" name="price" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Kitab Haqqında</label>
                                            <textarea class="form-control" name="description" id="" cols="30" rows="7">{{$data[0]['description']}}</textarea>
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
