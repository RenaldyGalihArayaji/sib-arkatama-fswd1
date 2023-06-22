@extends('home-page.main')

@section('content')
    
    <main id="main ">
        <div class="container mb-5 " style="margin-top: 150px " >
            <div class="section-header">
                <p><span>Category : </span></p>
            </div>
            <div class="row">
                @foreach ($product as $item)
                
                @if ($item->status == 'approve')
                  <div class="col-lg-3 menu-item mb-2 card-group">
                    <div class="card " >
                        <img src="{{ asset('/storage/gambar_product/' . $item->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h4 class="card-title">{{ $item->name}}</h4>
                        <p>
                          <strong class="text-danger">
                            {{ Currency_IDR($item->price)}}
                          </strong>
                        </p>
                        @auth
                        <a href="https://api.whatsapp.com/send/?phone=6281542232269&text&type=phone_number&app_absent=0" class="btn btn-success"><i class="bi bi-currency-dollar"></i>Pesan</a>
                        <a href="/detail-product/{{ $item->id }}" class="btn btn-warning text-white" >Detail</a>
                        @else
                        <a href="/detail-product/{{ $item->id }}" class="btn btn-warning text-white" >Detail</a>
                        @endauth
                        </div>
                    </div>
                  </div>
                @endif
                @endforeach
             </div>
         </div>
    </main><!-- End #main -->

@endsection