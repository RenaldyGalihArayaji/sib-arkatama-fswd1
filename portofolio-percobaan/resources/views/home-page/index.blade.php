
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Warung Digital | {{ $title }}</title>
 
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="{{ asset('/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/css/main.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center shadow">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <h1><strong><i class="bi bi-boxes text-danger">Warung</i> Digital</strong></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul class=>
          <li><a href="#hero">Home</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <ul>

          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-danger" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Selamat datang , <strong>{{ Auth::user()->name}}</strong>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profil</a></li>
              <div class="dropdown-divider"></div>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </li> 
          @else
          <a class="btn-book-a-table" href="/login">Login</a>
          @endauth
        </ul>
        
      </nav><!-- .navbar -->


      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" >
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height: 550px;margin-top:10px">
          @foreach( $slider as $data)
          <div class="carousel-item active">
            <img src="{{ asset('/storage/gambar_slider/' . $data->image)}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>{{ $data->name}}</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          @endforeach
          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </section><!-- End Hero Section -->

  <main id="main">

  <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
        <div class="container" >

          <div class="section-header">
              <p><span>Product</span></p>
          </div>

            <div class="row">
              @foreach ($product as $item)
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
                      <a href="#" class="btn btn-success"><i class="bi bi-cart"></i>Pesan</a>
                      <a href="/detail-product/{{ $item->id }}" class="btn btn-warning text-white" >Detail</a>
                      @else
                      <a href="/detail-product/{{ $item->id }}" class="btn btn-warning text-white" >Detail</a>
                      @endauth
                      </div>
                    </div>
              </div>
              @endforeach
            </div>
            <div class="row mt-5">
              <div>
                <button class="btn btn-secondary text-center"><a href="/all-product" class="text-white">Selengkapnya</a></button>
              </div>
            </div>
        </div>
    </section><!-- End Menu Section -->

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

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

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

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-4 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              Jl.Indonesia Maju <br>
              Yogyakarta 535022 - IND<br>
            </p>
          </div>

        </div>

        <div class="col-lg-4 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +62 8589 55488 55<br>
              <strong>Email:</strong> warungdigital@email.com<br>
            </p>
          </div>
        </div>


        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>warungdigital</span></strong>. 
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="{{ asset('/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/js/main.js')}}"></script>

</body>

</html>