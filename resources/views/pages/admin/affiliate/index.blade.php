@extends('template.admin')

@section('heading-title')
    Affiliate
@endsection

@section('content')

   <!-- DataTales -->
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <form class="d-flex col-md-6" action="/admin/affiliate/search" method="POST">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Cari berdasarkan kode affiliate..." aria-label="Search" name="keyword">
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
                            <th>No. Handphone</th>
                            <th>Kode Affiliate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($affiliates->count() > 0)
                            @foreach ($affiliates as $affiliate)
                                <tr>
                                    <td>{{ $affiliate->name }}</td>
                                    <td>{{ $affiliate->email }}</td>
                                    <td>{{ $affiliate->affiliateProfile->phone_number }}</td>
                                    <td>{{ $affiliate->affiliateProfile->affiliate_code }}</td>
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