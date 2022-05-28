<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;

use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\SuperAdmin;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class SuperAdminController extends Controller
{
    public function home()
    {
        return view('dashboard');
    }

    public function kelola_mhs_asli()
    {
        $penilaian = Penilaian::all();
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::all();
        return view('kelola_mhs_asli', compact('mahasiswa', 'jurusan', 'penilaian'));
    }
    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return view('superadmin.jurusan.index', compact('jurusan'));
    }

    public function superadmin()
    {
        $jurusan = Jurusan::all();
        return view('superadmin.mahasiswa.create', compact('jurusan'));
    }

    public function store_mahasiswa(Request $request)
    {

        $penilaian = DB::table('seleksi_mahasiswa')->select('tahun_akademik')->where('id_penilaian', $request->id_penilaian)->first();
        $date = Carbon::now()->format('Y');
        $thn = $penilaian->tahun_akademik;
        $tahun = explode("/", $thn);

        $request->validate([
            'name_mhs'   => 'required',
            'npm_mhs'   => 'required|unique:mahasiswa',
            'id_jurusan' => 'required',
            'id_penilaian' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',

        ]);

        DB::table('mahasiswa')->insert([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'id_penilaian' => $request->id_penilaian,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        if ($request->kelas == 'reg') {
            if($tahun[0]== $date )
            {
                Penilaian::where('id_penilaian', $request->id_penilaian)
                ->update([
                    'jml_calon_mhs_aktif_reguler' => DB::raw('jml_calon_mhs_aktif_reguler+1'),
                    'jml_calon_mhs_baru_reguler' => DB::raw('jml_calon_mhs_baru_reguler+1'),
                ]);
            }else
            {
                Penilaian::where('id_penilaian', $request->id_penilaian)
                ->update([
                    'jml_calon_mhs_aktif_reguler' => DB::raw('jml_calon_mhs_aktif_reguler+1'),
                ]);
            }   
        } else {
                if($tahun[0] == $date )
                {
                    Penilaian::where('id_penilaian', $request->id_penilaian)
                    ->update([
                        'jml_calon_mhs_aktif_transfer' => DB::raw('jml_calon_mhs_aktif_transfer+1'),
                        'jml_calon_mhs_baru_transfer' => DB::raw('jml_calon_mhs_baru_transfer+1'),
                    ]);
                }else
                {
                    Penilaian::where('id_penilaian', $request->id_penilaian)
                    ->update([
                        'jml_calon_mhs_aktif_transfer' => DB::raw('jml_calon_mhs_aktif_transfer+1'),
                    ]);
                }   
        }
        



        return redirect()->route('SuperAdmin/kelola_mhs_asli')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $admin = Mahasiswa::find($id);
        $jurusan = Jurusan::all();
        return view('superadmin.mahasiswa.edit', compact('superadmin', 'jurusan'));
    }
    public function update(Request $request, $id)
    {
        // return $request;
        DB::table('mahasiswa')->where('id', $id)->update([
            'name_mhs' => $request->name_mhs,
            'npm_mhs' => $request->npm_mhs,
            'id_jurusan' => $request->id_jurusan,
            'id_penilaian' => $request->id_penilaian,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('SuperAdmin/kelola_mhs_asli')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $admin = Mahasiswa::find($id);
        $admin->delete();

        return redirect()->route('SuperAdmin/kelola_mhs_asli')->with('success', 'Data berhasil dihapus');
    }
    public function nilai()
    {
        $penilaian = Penilaian::all();
        return view('superadmin.penilaian.index', compact('penilaian'));
    }
    public function store_nilai(Request $request)
    {
        $request->validate([
            'daya_tampung'   => 'required',
            'tahun_akademik'   => 'required|unique:seleksi_mahasiswa',
            'jml_calon_mhs_pendaftar'   => 'required',
            'jml_calon_mhs_seleksi'   => 'required',
        ]);
        // $mahasiswa = Mahasiswa::where('tahun_masuk', $request->tahun_masuk)->get();

        if ($request->daya_tampung >= $request->jml_calon_mhs_pendaftar) {
            DB::table('seleksi_mahasiswa')->insert([
                'id_penilaian' => $request->id_penilaian,
                'tahun_akademik' => $request->tahun_akademik,
                'jml_calon_mhs_pendaftar' => $request->jml_calon_mhs_pendaftar,
                'jml_calon_mhs_seleksi' => $request->jml_calon_mhs_seleksi,
                'jml_calon_mhs_baru_reguler' => '0',
                'jml_calon_mhs_baru_transfer' => '0',
                'jml_calon_mhs_aktif_reguler' => '0',
                'jml_calon_mhs_aktif_transfer' => '0',
                'daya_tampung' => $request->daya_tampung,
            ]);
            return redirect()->route('SuperAdmin/nilai')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect()->route('SuperAdmin/nilai')->with('success', 'Data tidak berhasil ditambahkan');
    }
    public function print_mahasiswa()
    {
    }
}
