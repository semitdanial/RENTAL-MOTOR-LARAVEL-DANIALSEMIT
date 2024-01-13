<!-- Start Contact Us -->
@extends('layouts.main')

@section('container')
<section class="contact-us section">
    <div class="container">
        <div class="inner">
            <!-- Check if there is a success message in the session -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row"> 
                <div class="col-md-6 image-container-vespa">
                    <img src="/img/vespa.png" alt="Logo" class="mb-6">
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-form">
                        <h2>Hubungi Kami</h2>
                        <p>Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami.</p>

                        <!-- Form -->
                        <form action="/contacts" class="form" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="nama" placeholder="Nama" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="kontak" placeholder="Telepon" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="alamat" placeholder="Alamat" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="pesan" placeholder="Pesan" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
@endsection

