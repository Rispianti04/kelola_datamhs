<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Mhsasing;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

// class SuperAdminController extends Controller
{
    // public function home()
    // {
    //     return view('dashboard');
    // }
    // public function kelola_mhs_asing()
    // {
    //     $jurusan = Jurusan::all();
    //     $mahasiswa = Mhsasing::all();
    //     return view('admin.mhsasing.index', compact('jurusan', 'mahasiswa'));
    // }
    // public function kelola_mhs_asli()
    // {
    //     $jurusan = Jurusan::all();
    //     $mahasiswa = Mahasiswa::all();
    //     return view('kelola_mhs_asing', compact('mahasiswa', 'jurusan'));
    // }
    // public function jurusan()
    // {
    //     $jurusan = Jurusan::all();
    //     return view('admin.jurusan.index', compact('jurusan'));
    // }

    // public function admin()
    // {
    //     $jurusan = Jurusan::all();
    //     return view('admin.mahasiswa.create', compact('jurusan'));
    // }
    // public function store(Request $request)
    // {
       
    //     $request->validate([
    //         'name_mhs'   => 'required',
    //         'npm_mhs'   => 'required|unique:mahasiswa',
    //         'id_jurusan' => 'required',
    //         'tahun_masuk' => 'required',
    //         'kelas'=> 'required',
    //         'jenis_kelamin'=> 'required',

    //     ]);

    //     DB::table('mahasiswa')->insert([
    //         'name_mhs' => $request->name_mhs,
    //         'npm_mhs' => $request->npm_mhs,
    //         'id_jurusan' => $request->id_jurusan,
    //         'tahun_masuk' => $request->tahun_masuk,
    //         'kelas'=>$request->kelas,
    //         'jenis_kelamin' =>$request->jenis_kelamin,
    //     ]);

    //     return redirect()->route('Admin/kelola_mhs_asli')->with('success', 'Data berhasil ditambahkan');
    // }
    // public function edit($id)
    // {
    //     $admin = Mahasiswa::find($id);
    //     $jurusan = Jurusan::all();
    //     return view('admin.mahasiswa.edit', compact('admin', 'jurusan'));
    // }
    // public function update(Request $request, $id)
    // {
    //     // return $request;
    //     DB::table('mahasiswa')->where('id', $id)->update([
    //         'name_mhs' => $request->name_mhs,
    //         'npm_mhs' => $request->npm_mhs,
    //         'id_jurusan' => $request->id_jurusan,
    //         'tahun_masuk' => $request->tahun_masuk,
    //     ]);
    //     return redirect()->route('Admin/kelola_mhs_asli')->with('success', 'Data berhasil diubah');
    // }

    // public function delete($id)
    // {
    //     $admin = Mahasiswa::find($id);
    //     $admin->delete();

    //     return redirect()->route('Admin/kelola_mhs_asli')->with('success', 'Data berhasil dihapus');
    // }
}
