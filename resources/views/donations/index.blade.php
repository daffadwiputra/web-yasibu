@extends('layouts.app')

@section('content')
    <h1>Donations</h1>

    @if (count($donations) > 0)
        <table class="table table-hover table-striped table-bordered" id="table_datatable" style="width:100%">
            <thead>
                <tr>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Nama Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                    <tr>
                        <td><a href="/donations/{{$donation->id}}">{{$donation->name}}</a></td>
                        <td>{{$donation->address}}</td>
                        <td>{{$donation->phone_number}}</td>
                        <td>{{$donation->goods_name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- {{$donations -> links()}} -->
    @else
        <p>No donations found</p>
    @endif

    <script>
        $(document).ready( function () {
            $('#table_datatable').DataTable();
        } );
    </script>
@endsection