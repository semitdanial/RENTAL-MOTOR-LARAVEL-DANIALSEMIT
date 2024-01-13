<?
// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'sewa_motor';

    protected $fillable = ['motor_id',
    'jumlah_motor',
    'tanggal_booking',
    'durasi_sewa',
    'harga_per_hari',
    'total_harga',];
    // Hubungan dengan model Motor
    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id');
    }
}
