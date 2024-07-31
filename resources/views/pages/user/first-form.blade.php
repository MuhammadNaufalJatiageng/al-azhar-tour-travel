@extends('template.user')

@section('body')
    
<form action="/daftar" method="post" class="col-md-4 rounded bg-light rounded-3 shadow-lg p-3">
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

  <input type="hidden" class="form-control" name="affiliate_code" @if($affiliateCode)
      value="{{ $affiliateCode }}"
  @endif">
{{-- Email --}}
  <div class="input-group mb-3">
    <span class="input-group-text" id="email">Email</span>
    <input type="email" class="form-control @error('email')
        is-invalid
    @enderror" name="email" required>
    @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
  </div>
{{-- Phone Number --}}
  <div class="input-group mb-3">
    <span class="input-group-text" id="phone_number">Nomor Whatsapp Aktif</span>
    <input type="number" class="form-control @error('phone_number')
        is-invalid
    @enderror" name="phone_number" required placeholder="cth : 08123456789">
    @error('phone_number')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
  </div>
{{-- Packet --}}
  <div class="input-group mb-3">
    <label class="input-group-text" for="packet">Paket</label>
    <select class="form-select @error('packet')
        is-invalid
    @enderror" id="packet" name="packet" required>
      <option selected hidden>Pilih Paket...</option>
      @foreach ($products as $product)
        {{-- <option class="fw-bold" disabled>{{ $product->catego }}</option> --}}
        <option value="{{ $product->title }}">{{ $product->title }}</option>
          
      @endforeach
    </select>
    @error('packet')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
  </div>
{{-- Number Of Registrans --}}
  <div class="input-group mb-3">
    <label class="input-group-text" for="numOfRegistrans">Jumlah Pendaftar</label>
    <select class="form-select @error('numOfRegistrans')
        is-invalid
    @enderror" id="numOfRegistrans" name="numOfRegistrans" required>
      <option value="1">Single ( 1 orang )</option>
      <option value="2">Double ( 2 orang )</option>
      <option value="3">Triple ( 3 orang )</option>
      <option value="4">Quad ( 4 orang )</option>
    </select>
    @error('numOfRegistrans')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
  </div>

  <button class="btn btn-primary d-block mx-auto mt-3">Ke Halaman Selanjutnya</button>
</form>

@endsection 