
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Warung Digital | Registrasi</title>

    {{-- Bootstrap --}}
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- icon bootstrtap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom styles  -->
    <link href="{{ asset('/css/sign-in.css')}}" rel="stylesheet">

  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary ">
    
      <main class="form-signin w-100 m-auto shadow rounded ">
        <form class="p-3" action="/registrasi" method="POST">
          @csrf
          <h3 class=" mb-3 fw-blod text-center">Registrasi</h3>
          <h5 class=" mb-3 fw-normal text-center"><i class="bi bi-boxes"></i> Warung Digital</h5>

          <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Username" name="name">
            <label for="floatingInput">Username</label>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com"  name="email">
            <label for="floatingInput">Email address</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password"  name="password">
            <label for="floatingPassword">Password</label>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          </div>
          <button class="btn btn-primary w-100 py-2" type="submit">Registrasi</button>
          <span>Your Login?<a href="/login">klik</a></span>
        </form>
      </main>

      {{-- Js bootstrap --}}
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
