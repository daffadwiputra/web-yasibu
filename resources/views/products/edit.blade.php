@extends('layouts.app')

@section('content')
<a href="/products" class="btn btn-outline-secondary">Go Back</a>
    <hr>
<h1>Formulir Daftar Produk</h1>
    <form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product_name">Nama Produk</label>
            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Nama Produk" value="{{$product->product_name}}">
            @if($errors -> has('product_name'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('product_name')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Harga" value="{{$product->price}}">
            @if($errors -> has('price'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('price')}}
                </div>
            @endif
        </div>

        <fieldset class="form-group">
            <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Ukuran</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="size" id="ukuran1" value="S">
                    <label class="form-check-label" for="ukuran1">
                        Kecil
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="size" id="ukuran2" value="M">
                    <label class="form-check-label" for="ukuran2">
                        Sedang
                    </label>
                    </div>
                    <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="size" id="ukuran3" value="L">
                    <label class="form-check-label" for="ukuran3">
                        Besar
                    </label>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Ukuran</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="sold_out" id="habis1" value="1">
                    <label class="form-check-label" for="habis1">
                        Sudah Habis
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="sold_out" id="habis2" value="0">
                    <label class="form-check-label" for="habis1">
                        Masih Tersedia
                    </label>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="form-group">
            <label for="description">Keterangan</label>
            <textarea class="form-control" name="description" id="article-ckeditor" rows="3" placeholder="Keterangan Produk">{{$product->description}}</textarea>
            @if($errors -> has('description'))
                <div class="alert alert-danger" role="alert">
                    {{$errors -> first('description')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="product_image">Upload Foto Barang</label>
            <input type="file" name="product_image" class = "form-control-file" id="product_image" aria-describedby="imageHelp">
            <small id="imageHelp" class="form-text text-muted">Ukuran gambar maximal 2 MB</small>
        </div>
    
        <input type="submit" class="btn btn-primary" value="Update">
        @method('PUT')

    </form>
@endsection