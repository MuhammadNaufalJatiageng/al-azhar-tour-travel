@extends('template.admin')

@section('heading-title')
    Dashboard
@endsection

@section('content')
<div class="container-fluid">

    <!-- Content Row -->

    <div class="row">

        <!-- Category -->
        <div class="col-xl-5 col-lg-6">
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
                            <input type="text" class="form-control @error('name')
                                is-invalid
                            @enderror" placeholder="Nama Kategori" name="name">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            @error('name')
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
                                <li class="list-group-item">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">Belum ada Kategori</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection