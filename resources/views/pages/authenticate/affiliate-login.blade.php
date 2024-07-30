@extends('template.auth')

@section('form')
    
  <form class="form" method="POST" action="/login/affiliate">
      @csrf
      <form class="form" method="POST" action="/affiliate/register">
        @csrf
        <h4 class="my-4 text-center">Affiliate Login</h4>
  
        <div class="mb-3 w-100">
          <input type="email" class="form-control @error('email')
              is-invalid
          @enderror" placeholder="Email" name="email">
        </div>
  
        <div class="mb-3 w-100">
          <input type="password" class="form-control @error('email')
              is-invalid
          @enderror" placeholder="Password" name="password">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>
    </form>
      <p class="signup-link mt-2">
          Belum punya akun?
          <a href="/affiliate/register" class="text-decoration-none">Daftar</a>
      </p>
  </form>

@endsection

