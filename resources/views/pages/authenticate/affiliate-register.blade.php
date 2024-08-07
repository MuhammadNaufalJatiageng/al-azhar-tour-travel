@extends('template.auth')

@section('form')
    
  <form class="form" method="POST" action="/affiliate/register">
      @csrf
      <h4 class="my-4 text-center">Affiliate Register</h4>

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
        <input type="number" class="form-control @error('phoneNumber')
            is-invalid
        @enderror" placeholder="Nomor Whatsapp" name="phoneNumber">
        @error('phoneNumber')
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

      <div class="d-flex align-items-center gap-2">
        <input type="checkbox" name="aggrement" id="myCheckbox">
        <label for="myCheckbox">
          <small >Saya setuju dengan <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">syarat dan ketentuan</a></small>
        </label>
      </div>
      
      <button type="submit" class="btn btn-primary w-100 mt-3" id="myButton" disabled>Daftar</button>
      <p class="signup-link mt-2">
        Sudah punya akun?
        <a href="/affiliate/login" class="text-decoration-none">Login</a>
    </p>
  </form>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Syarat dan Ketentuan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! $aggAff->body !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="{{ asset('js/checkbox.js') }}"></script>
@endsection

