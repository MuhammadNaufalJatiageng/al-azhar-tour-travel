@extends('template.admin')

@section('heading-title')
    Pendaftar
@endsection

@section('content')

   <!-- DataTales -->
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <form class="d-flex col-md-6" action="/admin/pendaftar/search" method="POST">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Handphone</th>
                            <th>Paket</th>
                            <th>Jumlah Peserta</th>
                            <th>Kode Affiliate</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($registrants->count() > 0)
                        @foreach ($registrants as $registrant)
                                <tr>
                                    <td>{{ $registrant->name }}</td>
                                    <td>{{ $registrant->email }}</td>
                                    <td>{{ $registrant->phone_number }}</td>
                                    <td>{{ $registrant->packet }}</td>
                                    <td>{{ $registrant->number_of_registrans }}</td>
                                    <td>{{ $registrant->affiliate_code }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <a href="/admin/pendaftar/{{ $registrant->id }}" class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  
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