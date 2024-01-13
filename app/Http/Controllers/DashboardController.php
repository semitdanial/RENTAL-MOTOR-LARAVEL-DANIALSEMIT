<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function indexadmin()
    {
        $motors = Motor::all();
        return view('dashboard.index', [
            "title" => "Dashboard Admin",
            "active" => "dashboard",
            "motors" => $motors, // Menambahkan variabel motors
        ]);
    }

    public function indexuser()
    {
        $motors = Motor::all();
        return view('dashboard.index', [
            "title" => "Dashboard User",
            "active" => "dashboard",
            "motors" => $motors, // Menambahkan variabel motors
        ]);
    }
}
