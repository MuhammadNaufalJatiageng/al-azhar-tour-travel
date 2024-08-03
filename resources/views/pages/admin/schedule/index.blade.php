@extends('template.admin')

@section('heading-title')
    Jadwal
@endsection

@section('content')

    <button type="button" class="btn btn-success btn-icon-split px-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <span class="icon text-white-50">
            <i class="fa-solid fa-download"></i>
        </span>
        <span class="text">
                Tambah Jadwal
        </span>
    </button>

   <!-- DataTales -->
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Jadwal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal Keberangkatan</th>
                            <th>Harga</th>
                            <th>Maskapai</th>
                            <th>Kategori</th>
                            <th>Hotel Mekkah</th>
                            <th>Hotel Madinah</th>
                            <th>Poster</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->departureDate }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->airline }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->hotelMekkah }}</td>
                                    <td>{{ $product->hotelMadinah }}</td>
                                    <td>
                                        <a href="{{ asset('storage/'. $product->poster) }}" download>{{ $product->poster }}</a>
                                    </td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <a href="/admin/schedule/detail/{{ $product->id }}" class="btn btn-info">Detail</a>
                                        <form action="/admin/schedule/delete/{{ $product->id }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
                <img src="{{ asset('storage/product-img/mIqtMfYaWSRYhMCKKuIWrg3kanPyguT43osXU8KA.jpg') }}" alt="">
            </div>
        </div>
    </div>

  
  @include('pages.admin.schedule.schedule-modal')


@endsection

@section('script')

    <script>
        const scheduleForm = document.getElementById('scheduleForm')
        const scheduleSubmit = document.getElementById('scheduleSubmit')

        scheduleSubmit.addEventListener('click', () => {
            scheduleForm.submit()
            console.log(true);
        })
    </script>
    
@endsection