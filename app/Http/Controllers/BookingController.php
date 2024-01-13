<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Booking;
use App\Models\SewaMotor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookingController extends Controller
{

    public function showForm()
{
    $availableMotors = Motor::where('stok', '>', 0)->get();

    return view('dashboard.booking.form', [
        'title' => 'Booking',
        'availableMotors' => $availableMotors,
    ]);
}

public function getMotorDetails($motorId)
{
    $motor = Motor::find($motorId);

    return response()->json([
        'harga' => $motor->harga,
        'stok' => $motor->stok,
    ]);
}
public function storeBooking(Request $request)
{
    // Validasi input
    $request->validate([
        'motor_id' => 'required|exists:motors,id',
        'jumlah_motor' => 'required|integer|min:1',
        'tanggal_booking' => 'required|date',
        'durasi_sewa' => 'required|integer|min:1',
    ]);

    // Dapatkan data motor
    $motor = Motor::find($request->motor_id);

    // Hitung harga berdasarkan durasi
    $hargaSewa = $motor->harga * $request->durasi_sewa * $request->jumlah_motor;

    // Lakukan operasi penyimpanan booking
    $booking = SewaMotor::create([
        'motor_id' => $motor->id,
        'jumlah_motor' => $request->jumlah_motor,
        'tanggal_booking' => $request->tanggal_booking,
        'durasi_sewa' => $request->durasi_sewa, // Pastikan 'durasi_sewa' disetel
        'harga_per_hari' => $motor->harga,
        'total_harga' => $hargaSewa,
    ]);

    // Kurangi stok motor
    $motor->stok -= $request->jumlah_motor;
    $motor->save();

    return redirect()->route('booking.showForm')->with('success', 'Booking berhasil!');
}

public function kembalikanMotor($sewaMotorId)
{
    $sewaMotor = SewaMotor::find($sewaMotorId);

    // Pastikan sewa_motor ditemukan dan belum dikembalikan
    if ($sewaMotor && !$sewaMotor->telah_dikembalikan) {
        // Kembalikan stok motor
        $motor = $sewaMotor->motor;
        $motor->stok += $sewaMotor->jumlah_motor;
        $motor->save();

        // Update status telah dikembalikan
        $sewaMotor->update(['telah_dikembalikan' => true]);

        // Hapus data dari tabel sewa_motor
        $sewaMotor->delete();

        return redirect()->back()->with('success', 'Motor telah berhasil dikembalikan.');
    }

    return redirect()->back()->with('error', 'Sewa motor tidak ditemukan atau telah dikembalikan sebelumnya.');
}

public function index(Request $request)
{
    $keyword = $request->input('keyword');

    // Jika tidak ada kata kunci pencarian, tampilkan data tanpa filter
    if ($keyword === null) {
        $sewaMotors = SewaMotor::simplePaginate(5);
    } else {
        // Jika terdapat kata kunci, lakukan pencarian berdasarkan ID motor
        $sewaMotors = SewaMotor::where('id_motor', 'like', "%$keyword%")->simplePaginate(5);
    }

    return view('dashboard.booking.databooking', [
        'title' => 'Data Booking',
        'sewaMotors' => $sewaMotors,
    ]);
}


public function edit($id)
{
    $sewaMotor = SewaMotor::findOrFail($id);
    return view('sewaMotor.edit', compact('sewaMotor'));
}

public function update(Request $request, $id)
{
    // Validasi data dari $request

    $sewaMotor = SewaMotor::findOrFail($id);

    // Simpan jumlah motor dan durasi sewa sebelum diupdate
    $jumlahMotorSebelumnya = $sewaMotor->jumlah_motor;
    $durasiSewaSebelumnya = $sewaMotor->durasi_sewa;

    // Update data sewa motor berdasarkan $id
    $sewaMotor->tanggal_booking = $request->tanggal_booking;
    $sewaMotor->jumlah_motor = $request->jumlah_motor;
    $sewaMotor->durasi_sewa = $request->durasi_sewa;

    // Hitung perubahan jumlah motor dan durasi sewa
    $perubahanJumlahMotor = $sewaMotor->jumlah_motor - $jumlahMotorSebelumnya;
    $perubahanDurasiSewa = $sewaMotor->durasi_sewa - $durasiSewaSebelumnya;

    // Hitung harga total berdasarkan perubahan jumlah motor dan durasi sewa
    $hargaMotor = $sewaMotor->motor->harga;
    $sewaMotor->total_harga = $hargaMotor * $request->jumlah_motor * $request->durasi_sewa;

    // Simpan perubahan
    $sewaMotor->save();
    // Perbarui stok motor yang terkait
    $motor = $sewaMotor->motor;
    $motor->stok -= $perubahanJumlahMotor;
    $motor->save();

    // Simpan perubahan
    $sewaMotor->save();

    return redirect()->route('sewaMotor.index')->with('success', 'Data sewa motor berhasil diperbarui!');
}


}
