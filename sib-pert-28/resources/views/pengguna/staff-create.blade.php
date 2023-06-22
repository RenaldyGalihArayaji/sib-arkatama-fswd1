@extends('layouts.main')

@section('content')

<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-title">Add Data</h1>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/staff-store" method="post" class="row g-3" >
                        @csrf
                    
                            <div class="mb-2">
                              <label for="name" class="form-label">Name </label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Name ">
                              @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                           
                            <div class="mb-2">
                              <label for="Email" class="form-label">Email</label>
                              <input type="email" class="form-control @error('Email') is-invalid @enderror" id="Email" name="email" placeholder="Masukan Email">
                              @error('Email')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                            
                            <div class="mb-2">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan password">
                              @error('password')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 
</div>

@endsection