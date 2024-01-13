<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaMotor extends Model
{
    use HasFactory;

    protected $table = 'sewa_motor';

    protected $fillable = ['motor_id',
    'jumlah_motor',
    'tanggal_booking',
    'durasi_sewa',
    'total_harga',];
    // Hubungan dengan model Motor
    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id');
    }
}
