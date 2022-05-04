<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Mhsasing;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }
    public function kelola_mhs_asing()
    {
        $jurusan = Jurusan::all();
        $mahasiswa = Mhsasing::all();
        return view('admin.mhsasing.index', compact('jurusan', 'mahasiswa'));

    }
    public function kelola_mhs_asli()
    {
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::all();
        return view('kelola_mhs_asing', compact('mahasiswa','jurusan'));
    }
    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function admin()
    {   
        $jurusan = Jurusan::all();
        return view('admin.mahasiswa.create', compact('jurusan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name_mhs'   => 'required',
            'npm_mhs'   => 'required|unique:mahasiswa',
            'id_jurusan' => 'required',
            'password_mhs' => 'required|min:8',
            'tahun_masuk' => 'required',

        ]);
        
        DB::table('mahasiswa')->insert([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'roles_id' => 2,
            'password_mhs' => Hash::make($request->password),
            'id_jurusan' => '1',
            'tahun_masuk' => $request->tahun_masuk,
        ]);
     
        return redirect()->route('Admin/kelola_mhs_asing')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $admin = Mahasiswa::find($id);
        $jurusan = Jurusan::all();
        return view('admin.mahasiswa.edit', compact('admin','jurusan'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_mhs'   => 'required',
            'npm_mhs'   => 'required',
            'id_jurusan' => 'required',
            'password_mhs' => 'required|min:8',
            'tahun_masuk' => 'required',

        ]);
        DB::table('mahasiswa')->where('id', $id)->update([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'password_mhs' => Hash::make($request->password_mhs),
            'tahun_masuk' => $request->tahun_masuk,
        ]);
        return redirect()->route('Admin/kelola_mhs_asing')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $admin = Mahasiswa::find($id);
        $admin->delete();
        return redirect()->route('Admin/kelola_mhs_asing')->with('success', 'Data berhasil dihapus');
    }
   
}
