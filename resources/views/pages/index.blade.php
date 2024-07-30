@extends('template.landing-page')

@section('content')
    {{-- Headline --}}
    <section class="container mt-5 text-center">
      <h2 class="fw-bold">Lebih dari 38 tahun dipercaya sebagai mitra Haji dan Umrah </h2>
      <p class="fs-5">Kami berkomitmen untuk memberikan pelayanan terbaik kepada para jamaah. Kami bekerja sama dengan maskapai penerbangan terkemuka untuk memastikan kenyamanan perjalanan udara, serta hotel-hotel yang terbaik di Makkah dan Madinah sehingga jamaah dapat merasa tenang dan fokus pada ibadah mereka.</p>
    </section>
    {{-- Documentation --}}
    <section class="my-5 d-flex justify-content-center border">
      <div id="documentation" class="carousel slide bg-light shadow py-3 rounded" style="width: 85%">
        <h2 class="text-center mb-3">Testimoni Haji dan Umrah</h2>
        <div class="carousel-inner ">
          <div class="carousel-item active text-center">
            <iframe src="https://www.youtube.com/embed/SsGDipYteiQ?autoplay=1&mute=1" class="rounded video"></iframe>
          </div>
          <div class="carousel-item text-center">
            <iframe src="https://www.youtube.com/embed/LJ_roqc9NoI?autoplay=1&mute=1" class="rounded video"></iframe>
          </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#documentation" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" style="filter: invert(100%)" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#documentation" data-bs-slide="next">
          <span class="carousel-control-next-icon" style="filter: invert(100%)"  aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <!-- Nearest Departure -->
    <section class="departure mt-5 p-3">
      <h2 class="text-center">Keberangkatan Terdekat</h2>
      <div class="departure-wrapper mt-4">
        @if ($haji || $umrah)
          @if ($haji)
            {{-- Haji --}}
            <div class="card mb-4 p-2 shadow">
              <img src='product-img/{{ $haji->poster }}' class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">{{ $haji->title }}</h5>
                <ul>  
                  <li class="mb-2">
                    <p class="m-0">Hotel Mekkah</p>
                    <p class="m-0">{{ $haji->hotelMekkah }}</p>
                  </li>
                  <li>
                    <p class="m-0">Hotel Madinah</p>
                    <p class="m-0">{{ $haji->hotelMadinah }}</p>
                  </li>
                </ul>
                <p class="card-text">Maskapai : {{ $haji->airline }}</p>
                {{-- <form action=""> --}}
                  <a href="/daftar" class="btn btn-primary w-100 {{ $haji->status? " " : 'disabled' }}">
                    Daftar
                  </a>
                {{-- </form> --}}
              </div>
            </div>
          @endif

          @if ($umrah)
            {{-- Umrah --}}
            <div class="card mb-4 p-2 shadow">
              <img src='product-img/{{ $umrah->poster }}' class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">{{ $umrah->title }}</h5>
                <ul>  
                  <li class="mb-2">
                    <p class="m-0">Hotel Mekkah</p>
                    <p class="m-0">{{ $umrah->hotelMekkah }}</p>
                  </li>
                  <li>
                    <p class="m-0">Hotel Madinah</p>
                    <p class="m-0">{{ $umrah->hotelMadinah }}</p>
                  </li>
                </ul>
                <p class="card-text">Maskapai : {{ $umrah->airline }}</p>
                {{-- <form action=""> --}}
                  <a href="/daftar" class="btn btn-primary w-100 {{ $umrah->status? " " : 'disabled' }}">
                    Daftar
                  </a>
                {{-- </form> --}}
              </div>
            </div>
          @endif
        @else
          <P class="text-secondary text-center">Belum ada jadwal keberangkatan</P>
        @endif
      </div>
    </section>

    {{-- Testimoni --}}
    <section class="my-5 d-flex justify-content-center border">
      <div id="testimoni" class="carousel slide bg-light shadow py-3 rounded" style="width: 85%">
        <h2 class="text-center mb-3">Testimoni Haji dan Umrah</h2>
        <div class="carousel-inner ">
          <div class="carousel-item active text-center">
            <iframe src="https://www.youtube.com/embed/SsGDipYteiQ?autoplay=1&mute=1" class="rounded video"></iframe>
          </div>
          <div class="carousel-item text-center">
            <iframe src="https://www.youtube.com/embed/LJ_roqc9NoI?autoplay=1&mute=1" class="rounded video"></iframe>
          </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimoni" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" style="filter: invert(100%)" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimoni" data-bs-slide="next">
          <span class="carousel-control-next-icon" style="filter: invert(100%)"  aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    {{-- Affiliate --}}
    <section class="mb-5 text-center">
      <h2>Menjadi Mitra Affiliate</h2>
      <p>Jadilah mitra affiliate kami dan dapatkan keuntungannya.</p>
      <a href="/affiliate/register" class="btn btn-secondary shadow px-5 py-2 fw-semibold font-monospace">Daftar Afiiliate</a>
    </section>

    <!-- Our Partner -->
    @if ($partners->count() > 0)
      <section class="container partner">
        <h2 class="text-center">Mitra Kami</h2>
        <div class="partner-wrapper mt-4">
          @foreach ($partners as $partner)
            <img src="{{ asset('partner-img/'.$partner->image) }}" alt="" />
          @endforeach
        </div>
      </section>
    @endif
@endsection