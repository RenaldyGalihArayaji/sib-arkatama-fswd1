@extends('layouts.main')

@section('content')
    
    <div class="container">
         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Product</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><iclass="fas fa-download fa-sm text-white-50"></iclass=> Generate Report</a>
        </div>

       <div class="row">
        @foreach ($data as $item)
        <div class="col-md-3">               
            <div class="card shadow">
                <img src="{{ asset('/storage/public/gambar_product/' .$item->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name}}</h5>
                    <p class="card-text">Rp.{{ $item->price}}</p>
                    <a href="#" class="btn btn-success">Cekout</a>
                    <a href="#" class="btn btn-warning">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
       </div>

    </div>
@endsection