<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: whitesmoke">

      
      <form action="/daftar" method="post" class="col-md-6 rounded bg-light rounded-3 shadow-lg p-5 ">
        @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
          </div>
        @endif
        @if (session()->has('fail'))
        <div class="alert alert-danger" role="alert">
            {{ session('fail') }}
          </div>
        @endif
        @csrf
        <h2 class="text-center mb-4">Daftar Haji dan Umrah</h2>
        <div class="input-group mb-3">
            <span class="input-group-text" id="fullname">Nama Lengkap</span>
            <input type="text" class="form-control @error('fullname')
                is-invalid
            @enderror" name="fullname" >
            @error('fullname')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="affiliate_code">Kode Affiliate</span>
            <input type="text" class="form-control" name="affiliate_code" @if($affiliateCode)
                value="{{ $affiliateCode }}"
            @endif placeholder="(optional)">
        </div>
        <button class="btn btn-primary">Daftar</button>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>