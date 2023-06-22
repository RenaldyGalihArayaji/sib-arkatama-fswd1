@extends('home-page.main')

@section('content')
    
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach ($slider as $item)
        
    <div class="carousel-item active" style="height: 800px">
      <img src="{{ asset('/storage/gambar_slider/' . $item->image)}}" class="d-block w-100" alt="..." style="height:100%;object-fit:cover;filter:brightness(0.6)">
    </div>

    @endforeach

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


  <main id="main">

    <div class="container mb-3" >

      <div class="section-header">
          <p><span>Product</span></p>
      </div>

        <div class="row">
          @foreach ($product as $item)
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
        </div>
        <div class="row mt-5">
          <div>
            <button class="btn btn-secondary text-center"><a href="/all-product" class="text-white">Selengkapnya</a></button>
          </div>
        </div>
    </div>

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $user }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pengguna</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $product->count() }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Product</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-4 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $category }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Category</p>
            </div>
          </div><!-- End Stats Item -->


        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>warungdigital@email.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+62 8589 55488 55</p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection