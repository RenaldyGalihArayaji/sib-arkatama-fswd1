@extends('layouts.main')

@section('content')

<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Data</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/product-update" method="post" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="{{ $data->id}}">
                              <label for="name" class="form-label">Name Product</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Name Product" value="{{ $data->name }}">
                              @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                           

                            <div class="col-md-6">
                              <label for="category_id" class="form-label">Category Product</label>
                              <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id"> 
                                  <option value="{{ $data->category->id }}">{{ $data->category->name }}</option>
                                  @foreach ($dataCategory as $a)
                                      <option value="{{ $a->id }}">{{ $a->name }}</option>
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
                              <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" placeholder="Masukan Qty" value="{{ $data->qty }}" >
                              @error('qty')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                            <div class="col-md-6">
                              <label for="price" class="form-label">Price</label>
                              <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Masukan Price" value="{{ $data->price }}">
                              @error('price')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>

                            <div class="col-md-8">
                              <label for="description" class="form-label">Description</label>
                              <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Masukan Description" value="{{ $data->description }}" >
                              @error('description')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="col-md-4 ">
                              <label for="image" class="form-label">Gambar</label>
                              <img src="{{ asset('/storage/gambar_product/'. $data->image ) }}" alt="" width="100">
                              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" >
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