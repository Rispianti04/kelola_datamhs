<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\penilaian;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Laporan;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function laporan()
    {
        $page = 'index';
        return view('superadmin/laporan/index', compact('page'));
    }
    public function mahasiswa()
    {
        $penilaian = Penilaian::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::all();
        return view('superadmin/laporan/mahasiswa', compact('penilaian', 'jurusan', 'mahasiswa'));
    }
    public function laporan_mahasiswa()
    {
        $penilaian = Penilaian::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::all();  
        return view('superadmin/laporan/index', compact('mahasiswa', 'jurusan', 'penilaian'));
    }
    public function cetak_pdf()
    {
        $mahasiswa = Mahasiswa::all();
        $pdf = PDF::loadview('superadmin/laporan/pdfmhs', ['mahasiswa' => $mahasiswa]);
        return $pdf->download('laporan-mahasiswa.pdf');
   
    }
}
