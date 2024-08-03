@extends('template.landing-page')

@section('content')

<section class="departure mt-5 p-3">
    <div class="departure-wrapper mt-4">
      @if ($products->count() > 0)
        @foreach ($products as $product)
            <div class="card mb-4 p-2 shadow">
                <img src='{{ asset('storage/'. $product->poster) }}' class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
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
                    <form action="">
                        <a href="/daftar" class="btn btn-primary w-100 {{ $product->status? " " : 'disabled' }}">
                        Daftar
                        </a>
                    </form>
                </div>
            </div>
        @endforeach
      @else
        <P class="text-secondary text-center">Belum ada jadwal keberangkatan</P>
      @endif
    </div>
</section>
    
@endsection