<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Main extends Model
{
    // Method to insert data into a specified table
    public static function Simpan($table, $data)
    {
        return DB::table($table)->insert($data);
    }

    // Method to update data in a specified table based on a condition
    public static function Ubah($table, $data, $where)
    {
        return DB::table($table)->where($where)->update($data);
    }

    // Method to delete data from a specified table based on a condition
    public static function Hapus($table, $where)
    {
        return DB::table($table)->where($where)->delete();
    }
}