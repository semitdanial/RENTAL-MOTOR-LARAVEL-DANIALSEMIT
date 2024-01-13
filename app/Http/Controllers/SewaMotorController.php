<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\SewaMotor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class SewaMotorController extends Controller
{
    public function showForm()
{
    $motors = Motor::where('stok', '>', 0)->get();
    $data = [
        'title' => 'Sewa Motor',
        'active' => 'sewa-motor',
        'motors' => $motors,
    ];
    return view('dashboard.sewa_motor.booking', $data);
}

public function sewaMotor(Request $request)
{
    $request->validate([
        'tipeMotor' => 'required|exists:motors,id',
        'tanggalBooking' => 'required|date',
        'durasiSewa' => 'required|integer|min:1',
        'jumlahMotor' => 'required|integer|min:1',
    ]);

    try {
        $motor = Motor::find($request->tipeMotor);
        $hargaSewa = $motor->harga * $request->durasiSewa;

        $sewaMotor = new SewaMotor([
            'motor_id' => $motor->id,
            'jumlah_motor' => $request->jumlahMotor,
            'tanggal_booking' => $request->tanggalBooking,
            'durasi_sewa' => $request->durasiSewa,
            'total_harga' => $hargaSewa,
        ]);

        $sewaMotor->save();

        $motor->stok -= $request->jumlahMotor;
        $motor->save();

        return redirect()->route('sewa.booking')->with('success', 'Motor berhasil disewa!');
    } catch (\Exception $e) {
        return redirect()->route('sewa.booking')->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
}

public function showBooking()
{
    $bookings = SewaMotor::all();
    dd($bookings); // Add this line to check if data is retrieved correctly
    return view('dashboard.sewa_motor.booking', ['bookings' => $bookings]);
}

public function returnStock($id)
{
    try {
        $booking = SewaMotor::find($id);

        $motor = $booking->motor;
        $motor->stok += $booking->jumlah_motor;
        $motor->save();

        $booking->delete();

        return redirect()->route('sewa.booking')->with('success', 'Stok motor berhasil dikembalikan!');
    } catch (\Exception $e) {
        return redirect()->route('sewa.booking')->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
}


    public function showCreateForm()
    {
        return view('dashboard.sewa_motor.create', [
            'title' => 'Input Motor',
        ]);
    }

    public function storeMotor(Request $request)
    {
        // Validasi input disini jika diperlukan

        // Simpan data motor baru ke dalam database
        Motor::create([
            'tipe' => $request->input('tipe'),
            'merek' => $request->input('merek'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
        ]);

        return redirect()->route('sewa.create')->with('success', 'Motor berhasil diinput!');
    }
}
