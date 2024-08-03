@extends('template.admin')

@section('heading-title')
    Detail Jadwal
@endsection

@section('content')
    <section class="bg-light p-4 shadow mb-4">
        <form action="/admin/schedule/update/{{ $product->id }}" method="post"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="input-group mb-3">
              <label class="input-group-text" for="category_id">Kategori</label>
              <select class="form-select" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option @if ($category->name == $product->category->name)
                        selected
                    @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          
            <div class="input-group mb-3">
                <span class="input-group-text" id="title">Judul</span>
                <input type="text" class="form-control" name="title" value="{{ $product->title }}">
            </div>
    
            <div class="input-group mb-3">
                <span class="input-group-text" id="price">Harga</span>
                <input type="text" class="form-control" name="price" placeholder="format ( XX Juta )" value="{{ $product->price }}"> 
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="hotelMekkah">Hotel Di Mekkah</span>
                <input type="text" class="form-control" name="hotelMekkah" value="{{ $product->hotelMekkah }}"> 
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="hotelMadinah">Hotel Di Madinah</span>
                <input type="text" class="form-control" name="hotelMadinah" value="{{ $product->hotelMadinah }}"> 
            </div>
    
            <div class="input-group mb-3">
                <span class="input-group-text" id="departureDate">Tanggal Keberangkatan</span>
                <input type="date" class="form-control" name="departureDate" value="{{ $product->departureDate }}"> 
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="poster">Poster</label>
                <input type="file" class="form-control" id="poster" name="poster">
            </div>

            <input type="hidden" name="oldPoster" value="{{ $product->poster }}">

            <div class="input-group mb-3">
                <label class="input-group-text" for="airline">Maskapai</label>
                <select class="form-select" id="airline" name="airline">
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