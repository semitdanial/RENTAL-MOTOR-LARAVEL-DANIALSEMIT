<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;

    protected $guarded =['id'];
//MENAMPILKAN DATA
public static function post_by($userId)
{
$query=DB::table('posts')
->select('*')
->where('username', $userId)
->get();
return $query;
}
    
}
