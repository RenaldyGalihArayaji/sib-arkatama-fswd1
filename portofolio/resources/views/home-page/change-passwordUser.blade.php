@extends('home-page.main')

@section('content')
    
  <<div class="container my-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class=" mb-0 text-gray-800 font-title mb-3 text-center">Change Password</h1>
          <div class="card shadow mb-4 p-3">          
              <div class="card-body">
              @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif

              @if(session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif

              <form method="POST" action="/change-passwordUser">
                  @csrf

                  <div class="form-group">
                      <label for="current_password">Current Password</label>
                      <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>

                      @error('current_password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="new_password">New Password</label>
                      <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror"
                      name="new_password" required>
 
                      @error('new_password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              
                  <div class="form-group">
                      <label for="new_password_confirmation">Confirm New Password</label>
                      <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                  </div>
              
                  <button type="submit" class="btn btn-primary mt-3">Simpan</button>
              </form>
           
              </div>
          </div>
      </div>
  </div>
</div>

@endsection