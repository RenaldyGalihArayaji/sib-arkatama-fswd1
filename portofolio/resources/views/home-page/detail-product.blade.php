@extends('home-page.main')

@section('content')
    
  <main id="main ">

  <div class="container p-5 " style="margin-top: 100px">
    <h3>Halaman Detail</h3>
    <div class="card mt-4">
        <div class="row p-4">
            <div class="col-md-8 ">
                <img src="{{ asset('/storage/gambar_product/' . $data->image)}}" alt="" width="600px">
            </div>
            <div class="col-md-4">
                <h1><strong>{{ $data->name }}</strong></h1>
                <h5>{{ $data->description }}</h5>
                <h6>Category : {{ $data->category['name'] }}</h6>
                <h6>Stock    : {{ $data->qty }}</h6>
                <h6>Harga    : {{ Currency_IDR($data->price) }}</h6>

                @auth
                <button class="btn btn-success mt-4"><a href="#" class="btn btn-success"><i class="bi bi-currency-dollar"></i>Chek Out</a></button>
                @endauth
          
              </div>
        </div>
    </div>
  </div>

  </main><!-- End #main -->

@endsection