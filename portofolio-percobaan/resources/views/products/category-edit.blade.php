@extends('layouts.main')

@section('content')

<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data</h1>
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/category-update" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                          <label for="name" class="form-label">Name Category</label>
                          <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" placeholder="Masukan Name Category" value="{{ $data->name }}">
                          @error('name')
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