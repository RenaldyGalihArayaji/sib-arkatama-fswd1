@extends('layouts.main')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-7">
            <h1 class=" mb-0 text-gray-800 font-title mb-3 text-center">Profil Update</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/profil-update" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="px-3">

                            <div class="mb-2">
                                <label for="no_hp" class="form-label">Nomor Handphone</label>
                                <input type="text" id="no_hp" class="form-control @error('no_hp')is-invalid @enderror" name="no_hp" value="{{ Auth::user()->no_hp}}">
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat')is-invalid @enderror" name="alamat" id="alamat" >{{ Auth::user()->alamat}}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" id="image " class="form-control @error('image')is-invalid @enderror" name="image" >
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>

 
</div>

@endsection