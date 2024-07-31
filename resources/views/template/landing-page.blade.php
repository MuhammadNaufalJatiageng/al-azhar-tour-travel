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
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg position-fixed w-100 py-3" id="navbar">
      <div class="container">
        <div class="d-flex align-items-center">
          <img src="{{ asset('img/altrav-logo.png') }}" alt=""  id="logo" class="d-none"/>
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
          <div class="navbar-nav fw-bold">
            <a class="nav-link {{ Request::is('/') ? 'text-orange' : '' }}" aria-current="page" href="/">Home</a>
            <a class="nav-link {{ Request::is('tour-package') ? 'text-orange' : '' }}" href="/tour-package">Paket Tour</a>
            <a class="nav-link" href="/affiliate/register">Daftar Affiliate</a>
            <a class="nav-link {{ Request::is('about-us') ? 'text-orange' : '' }}" href="/about-us">Tentang Kami</a>
            <a class="fw-bold btn btn-success ms-3" href="https://wa.me/62895391442002">Kontak Kami</a>
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
        <img src="{{ asset('partner-img/'.$banner->image) }}" alt=""/>
        <div class="overlay"></div>
      </div>
    </section>

    @yield('content')

    <footer class="mt-5 p-5">
      <div class="footer-header">
        <img src="{{ asset('/img/logo.png') }}" alt="" />
        <h3>Al Azhar Tour & Travel</h3>
        <p class="text-center mt-4">
          Jl. Sisingamangaraja No.2, RT.2/RW.1, Selong, Kec. Kby. Baru, Kota
          Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12110
        </p>
        <a href="https://maps.app.goo.gl/kfdPmzMYsuucn99Y6" class="btn btn-success px-5 py-2 mt-2 fw-semibold font-monospace rounded-pill">Lihat di Google Maps</a>
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
            <a href="https://www.instagram.com/al_azhar_travel/?hl=id">
              <i class="fa-brands fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="copyright">
        <p>&copy; 2024 <a href="#">alazhartravel.com</a></p>
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
    @yield('script')
  </body>
</html>
