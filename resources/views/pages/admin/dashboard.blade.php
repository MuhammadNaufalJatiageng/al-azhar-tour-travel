@extends('template.admin')

@section('heading-title')
    Dashboard
@endsection

@section('link')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

@endsection

@section('content')
<div class="container-fluid">

    <!-- Content Row -->

    <div class="row">

        <div class="col-lg-6">
            <!-- Category -->
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="/admin/category" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('category_name')
                                is-invalid
                            @enderror" placeholder="Nama Kategori" name="category_name">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            @error('category_name')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                    @if ($categories->count() > 0)
                        <ul class="list-group">
                            <li class="list-group-item bg-secondary-subtle fw-bold" >Daftar Ketegori</li>
                            @foreach ($categories as $category)
                                <li class="list-group-item d-flex justify-content-between">
                                    <p>{{ $category->name }}</p>
                                    <form action="/admin/category/{{ $category->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger py-1 px-3">Hapus</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">Belum ada Kategori</p>
                    @endif
                </div>
            </div>
            {{-- Aggrement --}}
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Syarat dan Ketentuan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body overflow-x-auto">
                    <form action="#" method="post">
                        @csrf
                        <ul class="list-group mb-2">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p>Affiliate</p>
                                <button type="button" class="btn btn-info py-1 px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#affiliate">Detail</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p>Haji dan Umrah</p>
                                <button type="button" class="btn btn-info py-1 px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#hajiDanUmrah">Detail</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            {{-- Partner --}}
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Mitra</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body overflow-x-auto">
                    <form action="/admin/partner" method="POST" enctype="multipart/form-data">
                        @csrf
                        <small class="badge badge-warning mb-2">Disarankan menggunakan aspect ratio 16 : 9</small>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control @error('image')
                                is-invalid
                            @enderror" name="image">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            @error('image')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                    @if ($partners->count() > 0)
                        <ul class="list-group mb-2">
                            <li class="list-group-item bg-secondary-subtle fw-bold" >Daftar Mitra</li>
                            @foreach ($partners as $partner)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <img src="{{ asset('storage/'.$partner->image) }}" class="partner-img">
                                    <form action="/admin/partner/{{ $partner->id }}" method="post" class="col-sm-6 text-end">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger py-1 px-3">Hapus</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center mb-2">Belum ada Mitra</p>
                    @endif
                    {{ $partners->links() }}
                </div>
            </div>
            
        </div>
        <div class="col-lg-6">
            {{-- Airlines --}}
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Maskapai</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="/admin/airline" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('airline_name')
                                is-invalid
                            @enderror" placeholder="Nama Maskapai" name="airline_name">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            @error('airline_name')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                    @if ($airlines->count() > 0)
                        <ul class="list-group">
                            <li class="list-group-item bg-secondary-subtle fw-bold" >Daftar Maskapai</li>
                            @foreach ($airlines as $airline)
                                <li class="list-group-item d-flex justify-content-between">
                                    <p>{{ $airline->name }}</p>
                                    <form action="/admin/airline/{{ $airline->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger py-1 px-3">Hapus</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">Belum ada Kategori</p>
                    @endif
                </div>
            </div>
            {{-- Banner --}}
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Banner</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="/admin/banner" method="POST" enctype="multipart/form-data" class="w-full">
                        @csrf
                        <div class="mb-3">
                            <label for="desktop" class="form-label">Desktop version</label>
                            <input type="file" class="form-control" id="desktop" required name="desktop">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile version</label>
                            <input type="file" class="form-control" id="mobile" required name="mobile">
                        </div>
                        <div class="w-100 text-center">
                            <button class="btn btn-primary w-50">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- Documentation --}}
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Video Dokumentasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body overflow-x-auto">
                    <form action="/admin/video/documentation" method="POST">
                        @csrf
                        <small class="badge badge-warning mb-2">cth: https://www.youtube.com/embed/SsGDipYteiQ?autoplay=1&mute=1</small>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('documentation')
                                is-invalid
                            @enderror" name="documentation">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            @error('documentation')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>

                    @if ($documentations->count() > 0)
                        <ul class="list-group">
                            <li class="list-group-item bg-secondary-subtle fw-bold" >Daftar Link Video</li>
                            @foreach ($documentations as $item)
                                <li class="list-group-item d-flex justify-content-between gap-1 overflow-x-auto">
                                    <p>{{ $item->link }}</p>
                                    <form action="/admin/video/{{ $item->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger py-1 px-3">Hapus</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">Belum ada video</p>
                    @endif
                </div>
            </div>
            {{-- Testimonial --}}
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Video Testimoni</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body overflow-x-auto">
                    <form action="/admin/video/testimonial" method="POST">
                        @csrf
                        <small class="badge badge-warning mb-2">cth: https://www.youtube.com/embed/SsGDipYteiQ?autoplay=1&mute=1</small>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('testimonial')
                                is-invalid
                            @enderror" name="testimonial" required>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            @error('testimonial')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                    @if ($testimonials->count() > 0)
                        <ul class="list-group">
                            <li class="list-group-item bg-secondary-subtle fw-bold" >Daftar Link Video</li>
                            @foreach ($testimonials as $item)
                                <li class="list-group-item d-flex justify-content-between gap-1 overflow-x-auto">
                                    <p>{{ $item->link }}</p>
                                    <form action="/admin/video/{{ $item->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger py-1 px-3">Hapus</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">Belum ada video</p>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>

{{-- Modal --}}

{{-- Affiliate aggrement modal --}}
<div class="modal fade" id="affiliate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Syarat dan ketentuan Affiliate</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/admin/aggrement/1" method="post" id="affForm">
                @csrf
                @method("PUT")
                 <input id="affilaiteAggrement" type="hidden" name="body" value="{{ $aggAff->body }}">
                <trix-editor input="affilaiteAggrement"></trix-editor>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="scheduleSubmit" form="affForm">Submit</button>
        </div>
      </div>
    </div>
</div>


{{-- Haji dan Umrah aggrement modal --}}
<div class="modal fade" id="hajiDanUmrah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Syarat dan ketentuan Haji dan Umrah</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/admin/aggrement/2" method="post" id="hajjForm">
                @csrf
                @method("PUT")
                 <input id="hajjAggrement" type="hidden" name="body" value="{{ $aggHajj->body }}">
                <trix-editor input="hajjAggrement"></trix-editor>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="scheduleSubmit" form="hajjForm">Submit</button>
        </div>
      </div>
    </div>
</div>
@endsection