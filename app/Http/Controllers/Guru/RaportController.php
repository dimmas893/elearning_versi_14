<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\guru_kelas;
use App\Models\Jadwal;
use App\Models\Nilai_tugas;
use App\Models\Raport;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RaportController extends Controller
{
    public function index()
    {
        $nilai_tugas = DB::table('nilai_tugas')
            ->leftjoin('siswa', 'nilai_tugas.siswa_id', '=', 'siswa.id')
            ->select(
                'siswa.name as siswa_name',
                // 'nilai_tugas.status as tugas_status',

                DB::raw('sum(nilai) as nilai')
            )
            ->groupBy('siswa.name')
            ->limit(10)
            ->orderBy('nilai', 'desc')
            ->get();

        $nilai_ulangan = DB::table('nilai_ulangan')
            ->leftjoin('siswa', 'nilai_ulangan.siswa_id', '=', 'siswa.id')
            ->select(
                'siswa.name as siswa_name',

                DB::raw('AVG(nilai) as nilai')
            )
            ->groupBy('siswa.name')
            ->limit(10)
            ->orderBy('nilai', 'desc')
            ->get();

        $nilai_ujian = DB::table('nilai_ujian')
            ->leftjoin('siswa', 'nilai_ujian.siswa_id', '=', 'siswa.id')
            ->select(
                'siswa.name as siswa_name',

                DB::raw('AVG(nilai) as nilai')
            )
            ->groupBy('siswa.name')
            ->limit(10)
            ->orderBy('nilai', 'desc')
            ->get();

        // $nilai_tugas = Nilai_tugas::leftjoin('siswa', 'nilai_tugas.siswa_id', '=', 'siswa.id')->select(
        //     'siswa.name as siswa_name',

        //     DB::raw('sum(nilai) as nilai')
        // )
        //     ->groupBy('siswa.name')
        //     ->limit(10)
        //     ->orderBy('nilai', 'desc')
        //     ->get();


        // $nilai_ann = $nilai_ujian->nilai
        // $nilai_tugas = Nilai_tugas::with('hitungTugas')->sum('nilai');
        // $nilai = $nilai_tugas->hitungTugas($nilai_tugas);
        // dd($nilai_ann);  
        return view('frontend.guru.raport.index', compact('nilai_tugas', 'nilai_ulangan', 'nilai_ujian'));
    }

    public function raport(Request $request)
    {
        $raport = Raport::with('siswa', 'kelas')->get();
        return view('frontend.guru.raport.buat', compact('raport'));
    }

    public function get_raport(Request $request, $id)
    {
        $raport = Raport::FindOrFail($id);
        return view('frontend.guru.raport.raport-get', compact('raport'));
    }

    public function raport_save(Request $request, $id)
    {
        $booking = Raport::findOrFail($id);
        $booking['nilai_tugas'] = $request->nilai_tugas;
        $booking['nilai_ulangan'] = $request->nilai_ulangan;
        $booking['nilai_ujian'] = $request->nilai_ujian;
        $booking->save();
        return back()->with('success', 'berhasi mengirim nilai');
    }

    // public function raport_store(Request $reques_

    //     $datajadwal = Jadwal::with('kelas')->where('id', $request->jadwal_id)->first();
    //     $dataSiswa = Ruangan::where('kelas_id', $datajadwal->kelas_id)->get();


    //     foreach ($dataSiswa as $p) {
    //         Raport::create([
    //             'nilai_tugas' => null,
    //             'nilai_ulangan' => null,
    //             'nilai_ujian' => null,
    //             'nilai_raport' => null,
    //             'siswa_id' => $p->siswa_id
    //         ]);

    //         return back()->with('success', 'tugas berhasil di buat');
    //     }

    //     return back()->with('error', 'tugas gagal di buat');
    // }
}
