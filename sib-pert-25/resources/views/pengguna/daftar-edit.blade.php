@extends('layouts.main')

@section('content')
    

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Daftar Pengguna</h1>
   </div>
   
   {{-- form --}}
   <div class="row ">
       <div class="col-md-8">
        <!-- Area Chart -->
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
            <form action="/daftar-update" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <label for="name" class="form-label">Name </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $data->name }}">
                    @error('name')
                    <div id="validationServer04Feedback" class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender </label>
                    <select class="form-select" aria-label="Default select example" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ $data->gender }}">
                        <option value="L">Laki-Laki</option>
                        <option value="p">Perempuan</option>
                      </select>
                    @error('gender')
                    <div id="validationServer04Feedback" class="invalid-feedback">
                     {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="group_id" class="form-label">Group </label>
                    <select class="form-select" aria-label="Default select example" class="form-control @error('group_id') is-invalid @enderror" id="group_id" name="group_id" value="{{ $data->group_id }}">
                        @foreach ($dataGroup as $item)
                            <option value="{{ $item->id}}">{{ $item->name}}</option>
                        @endforeach
                      </select>
                    @error('group_id')
                    <div id="validationServer04Feedback" class="invalid-feedback">
                     {{ $message }}
                    </div>
                    @enderror

                  <div class="mb-3">
                    <label for="address" class="form-label">Address </label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('name') is-invalid @enderror" >{{ $data->address }}</textarea>
                    @error('address')
                    <div id="validationServer04Feedback" class="invalid-feedback">
                     {{ $message }}
                    </div>
                    @enderror
                  </div>

                  </div>

                <button type="submit" class="btn btn-primary">Send</button>
              </form>
        </div>
       </div>
    </div>
   </div>
</div>
@endsection