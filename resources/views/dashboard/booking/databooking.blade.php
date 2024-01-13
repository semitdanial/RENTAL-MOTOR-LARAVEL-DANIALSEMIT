@extends('dashboard.layouts.main') 

@section('container')
    <div class="form-container">
        <h2>Daftar Sewa Motor</h2>
        <form action="{{ route('booking.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Cari berdasarkan Kode Motor">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Tanggal Booking</th>
                    <th>Jumlah Motor</th>
                    <th>Durasi Sewa</th>
                    <th>Harga Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sewaMotors as $sewaMotor)
                    <tr>
                        <td>SM-{{ $sewaMotor->id }}</td>
                        <td>{{ $sewaMotor->tanggal_booking }}</td>
                        <td>{{ $sewaMotor->jumlah_motor }}</td>
                        <td>{{ $sewaMotor->durasi_sewa }}</td>
                        <td>{{ $sewaMotor->total_harga }}</td>
                        <td>
                            @if (!$sewaMotor->telah_dikembalikan)
                                <a href="{{ route('sewaMotor.kembalikan', $sewaMotor->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengembalikan motor?')" class="btn btn-danger">Kembalikan Motor</a>
                            @endif
                            
                            <button class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal{{ $sewaMotor->id }}">Edit</button>
                        </td>
                    </tr>
                @endforeach
                @foreach($sewaMotors as $sewaMotor)
                <!-- ...data sewa motor lainnya... -->
                <div class="modal fade" id="editModal{{ $sewaMotor->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Sewa Motor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Konten formulir pengeditan -->
                                <form action="{{ route('sewaMotor.update', $sewaMotor->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Tambahkan input fields untuk mengedit data -->
                                    <div class="form-group">
                                        <label for="tanggal_booking">Tanggal Booking:</label>
                                        <input type="text" class="form-control" id="tanggal_booking" name="tanggal_booking" value="{{ $sewaMotor->tanggal_booking }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_motor">Jumlah Motor:</label>
                                        <input type="number" class="form-control" id="jumlah_motor" name="jumlah_motor" value="{{ $sewaMotor->jumlah_motor }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="durasi_sewa">Durasi Sewa (hari):</label>
                                        <input type="number" class="form-control" id="durasi_sewa" name="durasi_sewa" value="{{ $sewaMotor->durasi_sewa }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="total_harga">Harga Total:</label>
                                        <input type="number" class="form-control" id="total_harga" name="total_harga" value="{{ $sewaMotor->total_harga }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
        <script>
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    const modalId = event.target.dataset.target;
                    const modal = document.querySelector(modalId);
                    $(modal).modal('show'); // Tampilkan modal
                });
            });
        </script>
        <!-- Tampilkan Pagination -->
        {{ $sewaMotors->links() }}
    </div>
@endsection
