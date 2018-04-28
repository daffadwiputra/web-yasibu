@extends('layouts.app')

@section('content')
    <h1>Produk Kami</h1>

    @if (count($products) > 0)
        @foreach ($products as $product)
            <div class="card">        
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$product->product_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="card-header">
                            <h5 class="card-title"><a class ="card-link" href="/products/{{$product->id}}">{{$product->product_name}} ({{$product->size}})</a></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-text">Harga: {{$product->price}}</h5>
                            @if ($product->sold_out)
                            <h5 class="card-text text-right">Sudah Habis</h5>
                            @else
                            <h5 class="card-text text-right">Masih Tersedia</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    @else
        <p>Produk tidak dapat ditemukan</p>
    @endif
@endsection