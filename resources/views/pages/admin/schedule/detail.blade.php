@extends('template.admin')

@section('heading-title')
    Detail Jadwal
@endsection

@section('content')
    <section class="bg-light p-4 shadow mb-4">
        <form action="/admin/schedule/update/{{ $product->id }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
              <select class="form-select" id="inputGroupSelect01" name="category">
                <option selected>{{ $product->category }}</option>
                <option value="haji">Haji</option>
                <option value="umrah">Umrah</option>
              </select>
            </div>
          
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Judul</span>
                <input type="text" class="form-control" name="title" value="{{ $product->title }}">
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">Deskripsi</span>
                <textarea class="form-control" aria-label="With textarea" name="description">{{ $product->description }}</textarea>
            </div>
    
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Harga</span>
                <input type="text" class="form-control" name="price" placeholder="format ( XX Juta )" value="{{ $product->price }}"> 
            </div>
    
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tanggal Keberangkatan</span>
                <input type="date" class="form-control" name="departureDate" value="{{ $product->departureDate }}"> 
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Poster</label>
                <input type="file" class="form-control" id="inputGroupFile01" name="poster" id="poster">
            </div>

            <input type="hidden" name="oldPoster" value="{{ $product->poster }}">

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Maskapai</label>
                <select class="form-select" id="inputGroupSelect01" name="airline">
                  <option selected>{{ $product->airline }}</option>
                  <option value="Garuda Indonesia">Garuda Indonesia</option>
                </select>
            </div>

            <div class="text-center">
                <button class="btn btn-info px-5 fw-bold">Simpan</button>
            </div>
        </form>
    </section>
@endsection