<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('Admin/dashboard');
    }
    public function kelola_mhs_asing()
    {
        return view('kelola_mhs_asing');
    }
    public function kelola_mhs_asli()
    {
        return view('kelola_mhs_asli');
    }
   
}
