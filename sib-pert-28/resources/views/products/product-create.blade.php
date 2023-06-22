@extends('layouts.main')

@section('content')

<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-title">Add Data</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/product-store" method="post" class="row g-3" enctype="multipart/form-data">
                        @csrf
                    
                            <div class="col-md-6">
                              <label for="name" class="form-label">Name Product</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Name Product">
                              @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                           

                            <div class="col-md-6">
                              <label for="category_id" class="form-label">Category Product</label>
                              <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                                <option selected>..Pilih..</option>
                                @foreach ($data as $item)    
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                              @error('category_id')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                            <div class="col-md-6">
                              <label for="qty" class="form-label">Qty</label>
                              <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" placeholder="Masukan Qty">
                              @error('qty')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                            <div class="col-md-6">
                              <label for="price" class="form-label">Price</label>
                              <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Masukan Price">
                              @error('price')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                            <div class="col-md-8">
                              <label for="description" class="form-label">Description</label>
                              <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Masukan Description">
                              @error('description')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="col-md-4">
                              <label for="image" class="form-label">Gambar</label>
                              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
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