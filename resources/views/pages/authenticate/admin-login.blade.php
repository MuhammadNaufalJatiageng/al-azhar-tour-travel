@extends('template.auth')

@section('form')
    
  <form class="form" method="POST" action="/login/admin">
      @csrf
        <h4 class="my-4 text-center">Admin Login</h4>
  
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

@endsection

