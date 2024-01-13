@extends('layouts.main')

@section('container')
    <main id="body-content">
        <div class="container text-white w-75">
            <small class="fs-2 fw-light m-0 mt-lg-5">KE-RENT | {{ $title }}</small>
            <h1 class="display-2 fw-bold mb-3">Click Here <br>To Book <span class="brand">Your Bike</span>
            </h1>
            <div class="mb-3">
            <p class="w-50 fs-5 mb-3">
                Layanan pilihan terbaik untuk perjalanan Anda, percayakan perjalanan Anda pada kami.
            </p>
          </div>
            <a href="/login" class="btn icon-container text-white px-4 rounded-4 mb-5">Book now!</a>
            <div class="pos">
                <div class="row">
                    <div class="col-4 icon-container">
                        <div class="p-3">
                            <p>Harga Terjangkau</p>
                            <p>Layanan dengan harga yang bersaing dan ramah di kantong, membuat transportasi menjadi terjangkau untuk semua.</p>
                        </div>
                    </div>
                    <div class="col-4 p-0">
                        <div class="p-3 bg-secondary">
                            <p>Variatif</p>
                            <p>Memberikan kebebasan kepada pelanggan untuk memilih tipe atau merk motor yang sesuai dengan gaya hidup dan kebutuhan pengguna.</p>
                        </div>
                    </div>
                    <div class="col-4 p-0">
                        <div class="p-3 dark-background">
                            <p>Siap Antar Jemput</p>
                            <p>Menawarkan pelayanan antar jemput motor, memudahkan pelanggan untuk mendapatkan kendaraan tanpa harus datang ke lokasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
