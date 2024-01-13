<!-- resources/views/dashboard/booking/form.blade.php -->

@extends('dashboard.layouts.main')

@section('container')
<div class="form-container">
    <h2>Booking Motor</h2>
    <form action="{{ route('booking.store') }}" method="post" class="booking-form-container" id="bookingForm">
        @csrf
        <div class="form-row">
            <label for="motor_id">Pilih Motor:</label>
            <select id="motor_id" name="motor_id">
                @foreach($availableMotors as $motor)
                    <option value="{{ $motor->id }}" data-harga="{{ $motor->harga }}"> 
                        {{ $motor->tipe }} ({{ $motor->merek }}, Stok: {{ $motor->stok }})
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-row">
            <label for="harga">Harga per Motor/Hari:</label>
            <input type="text" id="harga" name="harga" readonly>
        </div>

        <div class="form-row">
            <label for="tanggal_booking">Tanggal Booking:</label>
            <input type="date" id="tanggal_booking" name="tanggal_booking" required>
        </div>

        <div class="form-row">
            <label for="durasi_sewa">Durasi Sewa (hari):</label>
            <input type="number" id="durasi_sewa" name="durasi_sewa" min="1" required>
        </div>

        <div class="form-row">
            <label for="jumlah_motor">Jumlah Motor:</label>
            <input type="number" id="jumlah_motor" name="jumlah_motor" min="1" required>
        </div>

        <div class="form-row">
            <button type="submit" onclick="showConfirmation()">Booking Motor</button>
        </div>
    </form>
</div>
@endsection
