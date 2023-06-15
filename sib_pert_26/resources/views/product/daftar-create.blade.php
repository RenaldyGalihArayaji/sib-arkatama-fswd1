@extends('layouts.main')

@section('content')
    

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Daftar Product</h1>
   </div>
   
   {{-- form --}}
   <div class="row ">
       <div class="col-md-12">
        <!-- Area Chart -->
       <div class="card shadow mb-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body ">
            <form action="/daftar-store" method="POST" enctype="multipart/form-data" class="px-4">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name Product</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                        @error('name')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" id="category_id" name="category_id">
                            <option selected>...Pilih...</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->name}}</option>    
                            @endforeach
                          </select>
    
                          @error('category_id')
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="qty" class="form-label">Qty</label>
                        <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty">
                        @error('qty')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                        @error('price')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-9">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                        @error('description')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                         {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                        <div id="validationServer04Feedback" class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Send</button>
            </form>
        </div>
       </div>
    </div>
   </div>
</div>
@endsection