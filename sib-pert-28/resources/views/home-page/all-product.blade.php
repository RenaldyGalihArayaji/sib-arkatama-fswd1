@extends('home-page.main')

@section('content')
    
    <main id="main ">
        <div class="container mb-5 " style="margin-top: 150px " >
            <div class="section-header">
                <p><span>All Product</span></p>
            </div>
            <div class="row">
              <div class="col-md-4 mb-4 ms-auto">

                <form class="d-flex" role="search" action="/all-product" method="get">
                  @csrf
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>

              </div>
            </div>
            <div class="row">

                @foreach ($data as $item)
                
                @if ($item->status == 'approve')
                  <div class="col-lg-3 menu-item mb-2 card-group">
                    <div class="card " >
                        <div class="position-absolute  px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.5)">{{ $item->category->name}}</div>
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

                {{-- Pagination --}}
                <nav aria-label="..." class="mt-5">
                  <ul class="pagination">
                    <li class="page-item {{ $data->currentPage() === 1 ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $data->previousPageUrl() }}" tabindex="-1" {{ $data->currentPage() === 1 ? 'aria-disabled=true' : '' }}>Previous</a>
                    </li>
                    @foreach ($data->getUrlRange($data->currentPage() - 1, $data->currentPage() + 1) as $page => $url)
                        <li class="page-item {{ $page === $data->currentPage() ? 'active' : '' }}" aria-current="page">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    <li class="page-item {{ !$data->hasMorePages() ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $data->nextPageUrl() }}" {{ !$data->hasMorePages() ? 'aria-disabled=true' : '' }}>Next</a>
                    </li>
                  </ul>
                </nav>

               
             </div>
         </div>
    </main><!-- End #main -->

@endsection