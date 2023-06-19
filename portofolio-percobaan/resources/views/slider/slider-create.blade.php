@extends('layouts.main')

@section('content')

<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Data</h1>
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/slider-store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="gambar" class="form-label">Title </label>
                          <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" placeholder="Masukan Title">
                          @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('image')is-invalid @enderror" id="image" name="image" >
                            @error('image')
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