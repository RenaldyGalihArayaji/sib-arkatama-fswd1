@extends('landing-page.layouts.main')

@section('content')

    <!-- carousol -->
    <section >
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" >
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://images.unsplash.com/photo-1588200908342-23b585c03e26?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8a29tcHV0ZXJ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://images.unsplash.com/photo-1588200908342-23b585c03e26?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8a29tcHV0ZXJ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100  " alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://images.unsplash.com/photo-1588200908342-23b585c03e26?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8a29tcHV0ZXJ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
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
      </section>
  
      <!-- product -->
      <section class="my-5">
        <div class="container">
          <h2 class="text-center">Product </h2>
          <div class="row my-5">
  
            <div class="col-md-3 mx-2 ">
              <div class="card shadow" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1588200908342-23b585c03e26?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8a29tcHV0ZXJ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Keyobard</h5>
                  <p class="card-text">Rp.1000.000</p>
                  <a href="#" class="btn btn-success">Beli</a>
                  <a href="#" class="btn btn-warning">Detai</a>
                </div>
              </div>
            </div>
  
            <div class="col-md-3 mx-2 ">
              <div class="card shadow" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1588200908342-23b585c03e26?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8a29tcHV0ZXJ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Keyobard</h5>
                  <p class="card-text">Rp.1000.000</p>
                  <a href="#" class="btn btn-success">Beli</a>
                  <a href="#" class="btn btn-warning">Detai</a>
                </div>
              </div>
            </div>
  
  
            
          </div>
        </div>
      </section>
    
@endsection