
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/admin/schedule" method="post" enctype="multipart/form-data" id="scheduleForm">
                @csrf
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                  <select class="form-select" id="category_id" name="category_id">
                    <option selected hidden>Kategori...</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Judul</span>
                    <input type="text" class="form-control" name="title">
                </div>
        
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Harga</span>
                    <input type="text" class="form-control" name="price" placeholder="format ( XX Juta )"> 
                </div>
        
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Tanggal Keberangkatan</span>
                    <input type="date" class="form-control" name="departureDate"> 
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Poster</label>
                    <input type="file" class="form-control" id="inputGroupFile01" name="poster" id="poster">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Hotel di Mekkah</span>
                  <input type="text" class="form-control" name="hotelMekkah"> 
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Hotel di Madinah</span>
                  <input type="text" class="form-control" name="hotelMadinah"> 
                </div>
        
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Maskapai</label>
                    <select class="form-select" id="inputGroupSelect01" name="airline">
                      <option selected hidden>Pilih maskapai...</option>
                      @foreach ($airlines as $airline)
                        <option value="{{ $airline->name }}">{{ $airline->name }}</option>
                      @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="scheduleSubmit">Submit</button>
        </div>
      </div>
    </div>
</div>