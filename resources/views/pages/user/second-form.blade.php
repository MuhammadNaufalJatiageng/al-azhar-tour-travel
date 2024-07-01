@extends('template.user')

@section('body')
    
<form action="/daftar/submit" method="post" class="col-md-4 rounded bg-light rounded-3 shadow-lg p-3">
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
  <img src="{{ asset('/img/altrav-logo.png') }}" alt="" width="180rem" class="d-block mx-auto">
  <h2 class="text-center my-4">Daftar Haji dan Umrah</h2>
    
  @for ($i = 1; $i <= $numOfRegistrans; $i++)

    <div class="row p-2 rounded mb-2">
        <h5 class="mb-3">Data Peserta {{ $i }}</h5>
                    
        <div class="input-group mb-3">
            <span class="input-group-text" id="name">Nama Lengkap</span>
            <input type="text" class="form-control @error('name[]')
                is-invalid
            @enderror" name="name[]" >
            @error('name[]')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
  @endfor

  <input type="hidden" name="email" value="{{ $email }}">
  <input type="hidden" name="affiliate_code" value="{{ $affiliate_code }}">
  <input type="hidden" name="packet" value="{{ $packet }}">
  <input type="hidden" name="phone_number" value="{{ $phone_number }}">
  <input type="hidden" name="numOfRegistrans" value="{{ $numOfRegistrans }}">
  

  <button class="btn btn-primary">Kirim</button>
</form>

@endsection