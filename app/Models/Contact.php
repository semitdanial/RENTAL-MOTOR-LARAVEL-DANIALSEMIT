<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'kontak', 'alamat', 'pesan'];

    // Jika Anda memiliki aturan validasi tambahan, Anda dapat menambahkannya di sini
    public static function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts|max:255',
            'kontak' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'pesan' => 'required|string',
        ];
    }
}
