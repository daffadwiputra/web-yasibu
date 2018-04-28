@extends('layouts.app')

@section('content')
<a href="/donations" class="btn btn-outline-secondary">Go Back</a>
    <hr>
<h1>Edit Form</h1>
    <form action="/donations/{{$donation->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nama" value="{{$donation->name}}">
            @if($errors -> has('name'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('name')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Alamat" value="{{$donation->address}}">
            @if($errors -> has('address'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('address')}}
                </div>
            @endif
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$donation->email}}">
                @if($errors -> has('email'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors -> first('email')}}
                    </div>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="phone_number">Nomor Telepon</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Nomor Telepon" value="{{$donation->phone_number}}">
                @if($errors -> has('phone_number'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors -> first('phone_number')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="goods_name">Nama Barang</label>
            <input type="text" name="goods_name" class="form-control" id="goods_name" placeholder="Nama Barang" value="{{$donation->goods_name}}">
            @if($errors -> has('goods_name'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('goods_name')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Keterangan</label>
            <textarea class="form-control" name="description" id="article-ckeditor" rows="3" placeholder="Keterangan">{{$donation->description}}</textarea>
            @if($errors -> has('description'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('description')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="cover_image">Upload Foto Barang</label>
            <input type="file" name="cover_image" class = "form-control-file" id="cover_image" aria-describedby="imageHelp">
            <small id="imageHelp" class="form-text text-muted">Ukuran gambar maximal 2 MB</small>
        </div>
    
        <input type="submit" class="btn btn-primary" value="Update">
        @method('PUT')

    </form>
@endsection