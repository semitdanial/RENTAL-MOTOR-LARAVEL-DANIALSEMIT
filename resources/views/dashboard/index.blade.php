@extends('dashboard.layouts.main')

@section('container')
<div class="form-container">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
</div>


        <table class="motor-table">
            <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Merek</th>
                    <th>Harga Sewa</th>
                    <th>Stok Motor</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($motors as $motor)
                <tr>
                    <td>{{ $motor->tipe }}</td>
                    <td>{{ $motor->merek }}</td>
                    <td>{{ $motor->harga }}</td>
                    <td>{{ $motor->stok }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Tidak ada data motor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
