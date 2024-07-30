@extends('template.landing-page')

@section('content')
<section class="mt-5 about-us">
    <div class="row container text-center align-items-center justify-content-center m-auto bg-light shadow-lg rounded rounded-4 p-4">
        <div class="col-md">
            <h2 class="mb-3 title">Tentang kami</h2>
        </div>
        <div class="col-md-8 shadow p-4 rounded rounded-4 border border-2">
            <p class="text-lg"><b>Travel Umroh al Azhar</b> adalah perusahaan travel yang telah lama beroperasi dan memiliki reputasi yang baik dalam menyediakan paket perjalanan umroh yang berkualitas.</p>
        </div>
    </div>
    
    <div class="row container flex-column text-center align-items-center justify-content-center m-auto bg-light shadow-lg rounded rounded-4 p-4 mt-5">
        <div>
            <h2 class="mb-3 title">Lebih dari 38 tahun dipercaya sebagai mitra Haji dan Umrah</h2>
        </div>
        <div class="shadow p-4 rounded rounded-4 border border-2">
            <p class="text-lg">Kami telah melayani ribuan jamaah yang ingin melaksanakan ibadah umroh dengan nyaman dan aman.</p>
            <p class="text-lg">Kami berkomitmen untuk memberikan pelayanan terbaik kepada para jamaah. Kami bekerja sama dengan maskapai penerbangan terkemuka untuk memastikan kenyamanan perjalanan udara, serta hotel-hotel yang terbaik di Makkah dan Madinah.
            </p>
        </div>
    </div>

    <div class="row container text-center align-items-center justify-content-center m-auto bg-light shadow-lg rounded rounded-4 p-4 my-5">
        <div class="col-md">
            <h2 class="mb-3 title">Mengapa memilih kami?</h2>
        </div>
        <div class="col-md-8 shadow p-4 rounded rounded-4 border border-2">
            <p class="text-lg">Selain penyediaan paket perjalanan dengan harga terjangkau, Travel Umroh al Azhar juga memberikan fasilitas dan pelayanan yang memenuhi kebutuhan para jamaah. Mereka memiliki tim yang terlatih dan berpengalaman dalam menjalankan perjalanan umroh, sehingga jamaah dapat merasa tenang dan fokus pada ibadah mereka.</p>
        </div>
    </div>

    <div class="parallax">
        <div class="top"></div>
        <div class="parallax-content">
          <h1 class="title">Our Mission</h1>
          <p>
            Dalam rangka mengemban misi dakwah, Yayasan Pesantren Islam (YPI)
            Al-Azhar telah memberikan pelayanan dalam penyelenggaraan perjalanan
            haji sejak tahun 1988 melalui Kelompok Bimbingan Ibadah Haji (KBIH)
            Al-Azhar. Untuk meningkatkan pelayanan, pada tahun 2004 YPI Al-Azhar
            mendirikan unit usaha pelayanan Umrah dan Haji Khusus dibawah
            manajemen Al Azhar Tour & Travel (dahulu PT. Arfina Margi Wisata).
            <b
              >Perusahaan berdiri sesuai dengan Akte Notaris SOELEMAN ARDJASASMITA
              No. 41 tanggal : 24 Oktober 1986</b
            >
          </p>
          <p>
            Secara umum, Al Azhar Tour & Travel bergerak dibidang tour and travel
            yang memberikan pelayanan penyelenggaraan perjalanan mulai dari
            ticketing, akomodasi hotel/penginapan, sampai penyediaan transportasi,
            baik untuk perjalanan darat maupun udara di dalam negeri/luar negeri.
          </p>
          <p>
            Selaras dengan visi Yayasan yang fokus kepada bidang pendidikan dan
            dakwah, maka fokus pelayanan Al Azhar Tour & Travel atau Al-Azhar Haji
            dan Umrah dalam penyelenggaraan perjalanan ibadah Umrah dan Haji
            Khusus adalah memberikan bimbingan dan pembinaan kepada jamaah untuk
            mencapai kesempurnaan ibadah dan meningkatnya keimanan dan ketaqwaan.
            Pembimbingan terhadap jamaah dilakukan melalui manasik haji dan umrah,
            sedangkan pembinaan kepada jamaah dilakukan melalui forum Persaudaraan
            Haji dan Umrah Al-Azhar serta media dakwah lainnya.
          </p>
        </div>
        <div class="parallax-img" id="parallax-img"></div>
        <div class="bottom"></div>
      </div>

</section>
@endsection

@section('script')
<script src="{{ asset('/js/parallax.js') }}"></script>
@endsection