<!-- resources/views/dashboard/sewa_motor/create.blade.php -->

@extends('dashboard.layouts.main')

@section('container')
    <div class="form-container">
        <h2>Tambah Motor Baru</h2>

        <form action="{{ route('sewa.storeMotor') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-lg-6">
                    <label for="tipe">Tipe Motor:</label>
                    <input type="text" id="tipe" name="tipe" required>
                </div>
                <div class="col-lg-6">
                    <label for="merek">Merek Motor:</label>
                    <input type="text" id="merek" name="merek" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <label for="harga">Harga Motor:</label>
                    <input type="number" id="harga" name="harga" min="0" required>
                </div>
                <div class="col-lg-6">
                    <label for="stok">Stok Motor:</label>
                    <input type="number" id="stok" name="stok" min="0" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-12">
                    <button type="submit">Tambah Motor</button>
                </div>
            </div>
        </form>
    </div>
@endsection
