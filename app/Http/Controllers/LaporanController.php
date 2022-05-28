<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function laporan()
    {
        $laporan = Laporan::all();
        return view('superadmin/laporan/index', compact('laporan'));
    }
}
