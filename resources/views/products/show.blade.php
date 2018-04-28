@extends('layouts.app')

@section('content')
    <a href="/products" class="btn btn-outline-secondary">Go Back</a>
    <hr>
        <div class="card">
            <h3 class="card-header">Detail Produk</h3>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/product_images/{{$product->product_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                    <h5 class="card-text">Nama Product   : {{$product->product_name}}</h5>
                    <hr>                    
                    <table class="table table-striped" style="width:100%">
                        <tr>
                            <th>Harga</th>
                            <td>{{$product->price}}</td>
                        </tr>
                        <tr>
                            <th>Ukuran</th>
                            <td>{{$product->size}}</td>
                        </tr>
                        <tr>
                            <th>Ukuran</th>
                            @if ($product -> sold_out)
                            <td>Sudah Habis</td>
                            @else
                            <td>Masih Tersedia</td>
                            @endif
                        </tr>
                    </table>                 
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <h5>Keterangan</h5>
                <p>{{$product->description}}</p>
            </div>
        </div>
        <hr>
        <a href="/products/{{$product->id}}/edit" class="btn btn-warning float-md-left">Edit</a>
        <form action="/products/{{$product ->id}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" name="submit" class="btn btn-danger float-md-right" value="Delete">
        </form>
        <br>
@endsection