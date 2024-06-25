@extends('template.auth')

@section('form')
    
  <form class="form" method="POST" action="/affiliate/register">
      @csrf
      <h4 class="mt-4 text-center">Affiliate Register</h4>

      <div class="mb-3 w-100">
        <input type="text" class="form-control @error('username')
            is-invalid
        @enderror" placeholder="Username" name="username">
        @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3 w-100">
        <input type="email" class="form-control @error('email')
            is-invalid
        @enderror" placeholder="Email" name="email">
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3 w-100">
        <input type="password" class="form-control @error('password')
            is-invalid
        @enderror" placeholder="Password" name="password">
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>
  </form>

@endsection

