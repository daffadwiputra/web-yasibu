@extends('layouts.app')

@section('content')
<a href="/" class="btn btn-outline-secondary">Go Back</a>
    <hr>
<h1>Formulir Donasi</h1>
<!-- <div class="card"> -->
    <!-- <div class="card-body"> -->
    <form action="/donations" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nama" value="{{old('name')}}">
            @if($errors -> has('name'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('name')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Alamat" value="{{old('address')}}">
            @if($errors -> has('address'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('address')}}
                </div>
            @endif
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
                @if($errors -> has('email'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors -> first('email')}}
                    </div>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="phone_number">Nomor Telepon</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Nomor Telepon" value="{{old('phone_number')}}">
                @if($errors -> has('phone_number'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors -> first('phone_number')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="goods_name">Nama Barang</label>
            <input type="text" name="goods_name" class="form-control" id="goods_name" placeholder="Nama Barang" value="{{old('goods_name')}}">
            @if($errors -> has('goods_name'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('goods_name')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Keterangan</label>
            <textarea class="form-control" name="description" id="article-ckeditor" rows="3" placeholder="Keterangan">{{old('description')}}</textarea>
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
    
        <input type="submit" class="btn btn-primary" value="Donasikan">

    </form>
    <!-- </div> -->
<!-- </div> -->
@endsection