@extends('layouts.main')

@section('content')

<div class="container">

    <div class="row justify-content-center">
      <div class="col-md-7">
          <h1 class=" mb-0 text-gray-800 font-title mb-3 text-center">Profil</h1>
            <div class="card shadow mb-4">

              @if (session()->has('succes'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('succes')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <div class="card-body py-3">
                    <div class="d-flex justify-content-center">
                      @if (Auth::user()->image )
                        <img src="{{ asset('/storage/foto-profil/'. Auth::user()->image )}}" class="img-thumbnail rounded-circle " alt="{{ Auth::user()->name}}" style="width: 130px;height:130px">
                      @else 
                      <img src="{{ asset('/storage/foto-profil/default.png')}}" class="img-thumbnail rounded-circle " alt="" style="width: 130px;height:130px">
                      @endif
                    </div>
                    <div class="px-4">
                
                          <div class="mb-2">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" id="name" class="form-control" name="name" disabled value="{{ Auth::user()->name}}">
                          </div>

                          <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" disabled value="{{ Auth::user()->email}}">
                          </div>

                          <div class="mb-2">
                            <label for="no Handphone" class="form-label">Nomor Handphone</label>
                            <input type="text" id="no Handphone" class="form-control" name="no Handphone"  value="{{ Auth::user()->no_hp}}" disabled>
                          </div>

                          <div class="mb-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" disabled>{{ Auth::user()->alamat}}</textarea>
                          </div>

                          <div class=" my-2 me-auto">
                            <a href="/profil-edit" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection