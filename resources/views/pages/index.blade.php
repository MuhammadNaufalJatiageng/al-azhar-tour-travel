<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Al Azhar Tour & Travel</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg position-fixed w-100 py-3" id="navbar">
      <div class="container">
        <div class="d-flex align-items-center">
          <img src="{{ asset('img/altrav-logo.png') }}" alt="" />
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNavAltMarkup"
        >
          <div class="navbar-nav">
            <a class="nav-link fw-bold" aria-current="page" href="#">Home</a>
            <a class="nav-link" href="#">Paket Tour</a>
            <a class="nav-link me-3" href="#">Tentang Kami</a>
            <a class="btn btn-success" href="https://wa.me/62895391442002">Kontak Kami</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- FLoating Button -->
    <section class="floating-btn">
      <a href="https://wa.me/62895391442002" class="pe-3">
        <img src="{{ asset('img/whatsapp.png') }}" alt="" />
        <small class="p-2 fw-bold">Chat kami untuk informasi Haji/Umrah</small>
      </a>
    </section>

    <!-- Banner -->
    <section class="banner">
      <div class="banner-wrapper">
        <img src="{{ asset('img/new-banner.jpg') }}" alt="" />
        <div class="overlay"></div>
      </div>
    </section>

    {{-- Documentation --}}
    <section class="my-5 d-flex justify-content-center">
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
        @if ($products->count() > 0)
          @foreach ($products as $product)
            <div class="card mb-4 p-2 shadow">
              <img src='product-img/{{ $product->poster }}' class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text"> Keberangkatan {{ $product->departureDate }}</p>
                <ul>
                  <li class="mb-2">
                    <p class="m-0">Hotel Mekkah</p>
                    <p class="m-0">{{ $product->hotelMekkah }}</p>
                  </li>
                  <li>
                    <p class="m-0">Hotel Madinah</p>
                    <p class="m-0">{{ $product->hotelMadinah }}</p>
                  </li>
                </ul>
                <p class="card-text">Maskapai : {{ $product->airline }}</p>
                {{-- <form action=""> --}}
                  <a href="/daftar" class="btn btn-primary w-100 {{ $product->status? " " : 'disabled' }}">
                    Daftar
                  </a>
                {{-- </form> --}}
              </div>
            </div>
          @endforeach
        @else
          <P class="text-secondary text-center">Belum ada jadwal keberangkatan</P>
        @endif
      </div>
    </section>

    {{-- Testimoni --}}
    <section class="my-5 d-flex justify-content-center">
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

    <!-- Our Partner -->
    <section class="container partner">
      <h2 class="text-center">Mitra Kami</h2>
      <div class="partner-wrapper mt-4">
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
        <img src="{{ asset('img/garuda-indonesia.png') }}" alt="" />
      </div>
    </section>

    <footer class="mt-5 p-5">
      <div class="footer-header">
        <img src="src/img/logo.png" alt="" />
        <h3>Al Azhar Tour & Travel</h3>
        <p class="text-center mt-4">
          Jl. Sisingamangaraja No.2, RT.2/RW.1, Selong, Kec. Kby. Baru, Kota
          Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12110
        </p>
      </div>
      <div class="footer-icon mt-5">
        <ul class="px-5">
          <li>
            <a href="">
              <i class="fa-brands fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="">
              <i class="fa-brands fa-twitter"></i>
            </a>
          </li>
          <li>
            <a href="">
              <i class="fa-brands fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="copyright">
        <p>&copy; 2023 <a href="#">alazhartravel.com</a></p>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <!-- Fontawesome -->
    <script
      src="https://kit.fontawesome.com/69fa005d8e.js"
      crossorigin="anonymous"
    ></script>
    <!-- Navbar Backgroud -->
    <script src="{{ asset('js/navbar.js') }}"></script>
  </body>
</html>
