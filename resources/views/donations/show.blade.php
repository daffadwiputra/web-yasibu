@extends('layouts.app')

@section('content')
    <a href="/donations" class="btn btn-outline-secondary">Go Back</a>
    <hr>
        <div class="card">
            <h3 class="card-header">Detail Donasi</h3>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$donation->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                    <h5 class="card-text">Nama Barang   : {{$donation->goods_name}}</h5>
                    <hr>                    
                    <table class="table table-striped" style="width:100%">
                        <tr>
                            <th>Nama Donatur</th>
                            <td>{{$donation->name}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{$donation->address}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{$donation->phone_number}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$donation->email}}</td>
                        </tr>
                    </table>
                        <small class="card-text text-muted">Donated at {{$donation->created_at}}</small>                    
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <h5>Keterangan</h5>
                <p>{{$donation->description}}</p>
            </div>
        </div>
        <hr>
        <a href="/donations/{{$donation->id}}/edit" class="btn btn-warning float-md-left">Edit</a>
        <form action="/donations/{{$donation ->id}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" name="submit" class="btn btn-danger float-md-right" value="Delete">
        </form>
        <br>
@endsection