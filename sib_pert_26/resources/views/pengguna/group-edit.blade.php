@extends('layouts.main')

@section('content')
    

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Group Pengguna</h1>
   </div>
   
   {{-- form --}}
   <div class="row ">
       <div class="col-md-8">
        <!-- Area Chart -->
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Data</h6>
        </div>
        <div class="card-body">
            <form action="/group-update" method="POST">
            @method('put')
            @csrf
                <div class="mb-3">
                    <input type="hidden" name="id" value="{{ $data->id}}">
                  <label for="name" class="form-label">Name </label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $data->name}}">
                  @error('name')
                  <div id="validationServer04Feedback" class="invalid-feedback">
                   {{ $message }}
                  </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
        </div>
       </div>
    </div>
   </div>
</div>
@endsection