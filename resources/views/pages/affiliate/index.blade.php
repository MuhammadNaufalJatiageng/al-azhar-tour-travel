<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Affiliate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}" />

  <body>
    <nav class="navbar navbar-expand-lg bg-light shadow w-100 py-3" id="navbar">
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
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown no-arrow">
                  <div class="btn-group">
                      <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        {{ auth()->user()->name }}
                      </button>
                      <ul class="dropdown-menu dropdown-menu-lg-end">
                          <li>
                              <form action="/logout" method="POST">
                                  @csrf
                                  <button class="dropdown-item" type="submit">Keluar</button>
                              </form>
                          </li>
                      </ul>
                    </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    
    <section class="container-fluid row mt-5 px-4 justify-content-around">
      <div class="col-sm-4">
        <div class="bg-light shadow rounded-3 mb-3 p-2">
          <h4>Nama</h4>
          <p>{{ auth()->user()->name}}</p>
        </div>
        <div class="bg-light shadow rounded-3 mb-3 p-2">
          <h4>Email</h4>
          <p>{{ auth()->user()->email}}</p>
        </div>
        <div class="bg-light shadow rounded-3 mb-3 p-2">
          <h4>Kode Affiliate</h4>
          <p>{{ auth()->user()->affiliateProfile->affiliate_code}}</p>
        </div>
        <div class="bg-light shadow rounded-3 mb-3 p-2">
          <h4>Link Affiliate</h4>
          <p>http://al-azhar-tour-travel.test/daftar/{{ auth()->user()->affiliateProfile->affiliate_code}}</p>
        </div>
      </div>
      
      <div class="col-sm-7 card shadow">
        <h4>Pendaftar yang menggunakan link anda</h4>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Nomor Handphone</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($registrants as $registrant)
              <tr>
                <td>{{ $registrant->name }}</td>
                <td>{{ $registrant->phone_number }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>