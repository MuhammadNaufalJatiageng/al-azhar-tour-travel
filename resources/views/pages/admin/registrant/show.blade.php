@extends('template.admin')

@section('heading-title')
    Detail Pendaftar
@endsection

@section('content')

<div class="row mb-5 justify-content-center">
    <div class="col-md-6">
        <ul class="list-group shadow-lg">
            <li class="list-group-item">
                <h5>Email</h5>
                <p>{{ $data->email }}</p>
            </li>
            <li class="list-group-item">
                <h5>Nomor Handphone</h5>
                <p>{{ $data->phone_number }}</p>
            </li>
            <li class="list-group-item">
                <h5>Affiliate</h5>
                <p>{{ $data->affiliate_code ? $data->affiliate_code : "-"}}</p>
            </li>
            <li class="list-group-item">
                <h5>Paket</h5>
                <p>{{ $data->packet }}</p>
            </li>
            <li class="list-group-item">
                <h5>Jumlah Peserta</h5>
                <p>{{ $data->number_of_registrans }}</p>
            </li>
          </ul>
    </div>

    <div class="col-md-6">
        <ul class="list-group shadow-lg">
            <li class="list-group-item bg-secondary-subtle fw-bold" aria-current="true">Daftar Peserta</li>
            @foreach ($registrants as $registrant)
                <li class="list-group-item">
                    <h6>{{ $loop->iteration }}. {{ $registrant->name }}</h6>
                </li>
            @endforeach
          </ul>
    </div>
</div>

@endsection