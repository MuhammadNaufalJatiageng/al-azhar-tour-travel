@extends('template.admin')

@section('heading-title')
    Pendaftar
@endsection

@section('content')

   <!-- DataTales -->
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pendaftar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Affiliate_code</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($registrants->count() > 0)
                            @foreach ($registrants as $registrant)
                                <tr>
                                    <td>{{ $registrant->fullname }}</td>
                                    <td>{{ $registrant->affiliate_code }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        <a href="/admin/schedule/detail" class="btn btn-info">Detail</a>
                                        <form action="/admin/schedule/delete" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
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