<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades;
use DB;
use Illuminate\Http\Request;
use App\Models\Mhsasing;
use App\Http\Controllers\Admin\JurusanController;
use App\Models\Mahasiswa;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\penilaian2;
use Carbon\Carbon;


class MahasiswaController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function kelola_mhs_asing()
    {
        $penilaian2 = penilaian2::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mhsasing::all();
        return view('superadmin/mhsasing/index', compact('mahasiswa', 'jurusan', 'penilaian2'));
    }
    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return view('superadmin.jurusan.index', compact('jurusan'));
    }
    public function superadmin()
    {
        $jurusan = Jurusan::all();
        return view('superadmin.mhsasing.create', compact('jurusan'));
    }
    public function store(Request $request)
    {
        $penilaian = DB::table('seleksi_mahasiswa2')->select('tahun_akademik')->where('id_penilaian', $request->id_penilaian)->first();
        $date = Carbon::now()->format('Y');
        $request->validate([
            'name_mhs'   => 'required',
            'npm_mhs'   => 'required|unique:mahasiswa',
            'id_jurusan' => 'required',
            'id_penilaian' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'keterangan' => 'required',

        ]);

        DB::table('mahasiswa_asing')->insert([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'id_penilaian' => $request->id_penilaian,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keterangan' => $request->keterangan,
        ]);
    //     if ($request->kelas == 'reg') 
    //     {
    //         if($date == $req->id_penilaian)
    //         {
    //             Penilaian::where('id_penilaian', $request->id_penilaian)
    //             ->update([
    //                 'jml_calon_mhs_aktif_reguler' => DB::raw('jml_calon_mhs_aktif_reguler+1'),
    //             ]);
    //         }elseif{
    //                 Penilaian::where('id_penilaian', $request->id_penilaian)
    //                     ->update([
    //                         'jml_calon_mhs_aktif_transfer' => DB::raw('jml_calon_mhs_aktif_transfer+1'),
    //                     ]);
    //             }elseif($request->tahun_sekarang == 'tahun_akademik') 
    //             {
    //                 Penilaian::where('id_penilaian', $request->id_penilaian)
    //                     ->update([
    //                         'jml_calon_mhs_baru_reguler' => DB::raw('jml_calon_mhs_baru_reguler+1'),
    //                     ]);
    //             } else {
    //                     Penilaian::where('id_penilaian', $request->id_penilaian)
    //                         ->update([
    //                             'jml_calon_mhs_baru_transfer' => DB::raw('jml_calon_mhs_baru_transfer+1'),
    //                         ]);
    //                 }
    //     }
    // }

        return redirect()->route('Mahasiswa/index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $admin = Mhsasing::find($id);
        $jurusan = Jurusan::all();
        return view('superadmin.mhsasing.edit', compact('superadmin', 'jurusan'));
    }
    public function update(Request $request, $id)
    {
        // return $request;
        DB::table('mahasiswa_asing')->where('id', $id)->update([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'id_penilaian' => $request->id_penilaian,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('Mahasiswa/index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        
        $admin = Mhsasing::find($id);
        $admin->delete();
        return redirect()->route('Mahasiswa/delete')->with('success', 'Data berhasil dihapus');
    }
    public function nilai2()
    {
        $penilaian2 = penilaian2::all();
        return view('superadmin/penilaian2/index', compact('penilaian2'));
    }
    public function store_nilai2(Request $request)
    {
        
        $request->validate([
            'prodi'   => 'required',
            'tahun_akademik'   => 'required|unique:seleksi_mahasiswa2',
            'jml_calon_mhs_pendaftar'   => 'required',
            'jml_calon_mhs_seleksi'   => 'required',
        ]);
       
        // $mahasiswa = Mahasiswa::where('tahun_masuk', $request->tahun_masuk)->get();

        if ($request->daya_tampung >= $request->jml_calon_mhs_pendaftar) {
            DB::table('seleksi_mahasiswa2')->insert([
                'id_penilaian' => $request->id_penilaian,
                'tahun_akademik' => $request->tahun_akademik,
                'jml_mhs_asing_aktif'=>$request->jml_mhs_asing_aktif,
                'jml_mhs_asing_full'=>$request->jml_mhs_asing_full,
                'jml_mhs_asing_part'=>$request->jml_mhs_asing_part,
            ]);
            return redirect()->route('Mahasiswa/nilai2')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect()->route('Mahasiswa/nilai2')->with('success', 'Data tidak berhasil ditambahkan');
    }
}
