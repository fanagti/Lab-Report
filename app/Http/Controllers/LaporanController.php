<?php

namespace App\Http\Controllers;

use App\Models\DetailLaporanLab;
use App\Models\Guru;
use App\Models\Lab;
use App\Models\LaporanLab;
use App\Models\Pc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(Request $request) {
        // $laporanLabs = LaporanLab::all();
        // dd( Carbon::today());
        // dd(isset($request->date));
        if(isset($request->date)){
            $today=$request->date;
            $laporanLabs = LaporanLab::whereDate('created_at', $request->date)->get();
        }else{
            $today = Carbon::today(); // Mendapatkan tanggal hari ini
            $laporanLabs = LaporanLab::whereDate('created_at', $today)->get();
        }
        $today = Carbon::parse($today)->translatedFormat('j-F-Y');
        //  dd( Carbon::today());
        $todayForm = Carbon::parse($today)->toDateString();
        // dd($todayForm);


        return view('admin.laporan', compact('laporanLabs','today', 'todayForm'));
    }
    public function show($laporanId){
        // Ambil laporan berdasarkan ID
        $laporan = LaporanLab::findOrFail($laporanId);

        // Ambil semua PC yang terkait dengan lab
        $pcs = Pc::where('lab_id', $laporan->lab->id)->get();  // Ambil 36 PC (pastikan ada 36 PC)
        $pcCount = $pcs->count();  // Ambil 36 PC (pastikan ada 36 PC)

        // Ambil data DetailLaporanLab untuk laporan yang spesifik
        $detailLaporanLabs = DetailLaporanLab::where('laporan_lab_id', $laporanId)->get();

        // Menghitung jumlah monitor yang tidak ada
        $monitorTidakAda = $detailLaporanLabs->filter(function($detail) {
            return !$detail->has_monitor;  // Mengambil data yang has_monitor == false
        })->count();

        // Menghitung jumlah mouse yang tidak ada
        $mouseTidakAda = $detailLaporanLabs->filter(function($detail) {
            return !$detail->has_mouse;  // Mengambil data yang has_mouse == false
        })->count();

        $keyboardTidakAda = $detailLaporanLabs->filter(function($detail) {
            return !$detail->has_keyboard;  // Mengambil data yang has_mouse == false
        })->count();

        $pcTidakAda = $detailLaporanLabs->filter(function($detail) {
            return !$detail->has_pc;  // Mengambil data yang has_mouse == false
        })->count();

        $monitorAda = $pcCount - $monitorTidakAda;
        $mouseAda = $pcCount - $mouseTidakAda;
        $keyboardAda = $pcCount - $keyboardTidakAda;
        $pcAda = $pcCount - $pcTidakAda;

        $countLaporan = $detailLaporanLabs->count();

        // Kirim data ke tampilan
        return view('admin.laporan-detail', compact(
        'laporan',
        'pcs',
        'detailLaporanLabs',
        'laporanId',
        'monitorTidakAda',
        'mouseTidakAda',
        'keyboardTidakAda',
        'pcTidakAda',
        'monitorAda',
        'mouseAda',
        'keyboardAda',
        'pcAda',
        'countLaporan'));
    }

    //user
    public function formLaporanPage(){
        $is_user_has_reported = Lab::where('user_id', '=', Auth::user()->id)->get()->isNotEmpty();
        $labs = Lab::all();
        $gurus = Guru::all();
        $laporan = LaporanLab::where('user_id', Auth::user()->id)->get();
        // dd($laporan);
        return view('user.form-laporan', compact(['labs',
         'gurus',
         'laporan',
        'is_user_has_reported']));
    }

    public function formLaporan(Request $request) {
        // dd(Auth::user()->id);
        $validated = $request->validate([
            'lab_id' => 'required|exists:labs,id',
            'guru_id' => 'required|exists:gurus,id',
            'mapel_id' => 'required|exists:mapels,id',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $lab =Lab::where('id', $validated['lab_id'])->first();

        if($lab->used == 1) {
            // return back()->with('err', 'kesalahan Data used');
            dd($lab->used, $lab);
        };
        // dd(Auth::user()->id);

        // persiapan untuk dhapus
        // $id= LaporanLab::create([
        //     'lab_id' => $request->lab_id,
        //     'guru_id' => $request->guru_id,
        //     'mapel_id' => $request->mapel_id,
        //     'user_id' => Auth::user()->id,
        //     'jam_mulai' => $request->jam_mulai,
        //     'jam_selesai' => $request->jam_selesai,
        //     'network' => $request->network
        // ]);

        $request->session()->put('lab_id', $request->lab_id);
        $request->session()->put('guru_id', $request->guru_id);
        $request->session()->put('mapel_id', $request->mapel_id);
        $request->session()->put('jam_mulai', $request->jam_mulai);
        $request->session()->put('jam_selesai', $request->jam_selesai);
        $request->session()->put('network', $request->network);
        // TODO pindah update lab ke lab-edit
        // $time_usage = $request->jam_mulai." s.d. ".$request->jam_selesai;
        // Lab::find($validated['lab_id'])->update([
        //     'user_id' => Auth::user()->id,
        //     'time_usage' => $time_usage
        // ]);

        return redirect()->route('lab-edit', ['labId' => $validated['lab_id']]);
    }

    public function labLaporanPage($labId) {
        $lab = Lab::with('pcs')->findOrFail($labId);

        // Mengambil lab beserta PC-nya
        return view('user.edit-laporan',
        ["lab" => $lab,
        "labId" => $labId,
        'id' => Auth::user()->id ]
    );  // Mengirim data lab ke view
    }

    public function labLaporan(Request $request, $labId)  {
        // Validasi input jika diperlukan
        $request->validate([
            'network' => 'required'
        ]);
        // dd($request->network);

        $laporanId = LaporanLab::create([
            'lab_id' => $request->session()->get('lab_id'),
            'guru_id' => $request->session()->get('guru_id'),
            'mapel_id' => $request->session()->get('mapel_id'),
            'user_id' => Auth::user()->id,
            'jam_mulai' => $request->session()->get('jam_mulai'),
            'jam_selesai' => $request->session()->get('jam_selesai'),
            'network' => $request->network
        ]);

        $time_usage = $request->session()->get('jam_mulai')." s.d. ".$request->session()->get('jam_selesai');
        Lab::find($request->session()->get('lab_id'))->update([
            'user_id' => Auth::user()->id,
            'time_usage' => $time_usage,
            'network' => $request->network
        ]);


        // Loop melalui data PC yang dikirim
        foreach ($request->pcs as $pcId => $pcData) {
            // Periksa jika ada perangkat yang *false*
            // $hasPc = isset($pcData);
            // dd($pcData);

            $hasMonitor = isset($pcData['has_monitor']);
            $hasKeyboard = isset($pcData['has_keyboard']);
            $hasMouse = isset($pcData['has_mouse']);
            $hasPc = isset($pcData['has_pc']);
            if (!$hasMonitor || !$hasKeyboard || !$hasMouse || !$hasPc) {
                // Jika ada perangkat *false*, simpan ke DetailLaporanLab
                DetailLaporanLab::create([
                    'laporan_lab_id' => $laporanId->id,
                    'lab_id' => $labId,
                    'pc_id' => $pcId,
                    'has_monitor' => $hasMonitor,
                    'has_keyboard' => $hasKeyboard,
                    'has_mouse' => $hasMouse,
                    'has_pc' => $hasPc,
                ]);
            }
        }
        $request->session()->forget(['lab_id', 'guru_id', 'mapel_id','user_id', 'jam_mulai', 'jam_selesai', 'network']);
        // Redirect dengan pesan sukses
        return redirect('/laporan-lab')->with('success', 'Laporan berhasil disimpan');
    }


    public function confirmDelete(Request $request)
    {
        if(isset($request->date)){
            $today=$request->date;
            $laporanLabs = LaporanLab::where('created_at', '<', $request->date)->get();
            if ($laporanLabs->count() == 0){
                $laporanLabs = null;
            };
            $today = Carbon::parse($today)->translatedFormat('j-F-Y');
            $todayForm = Carbon::parse($today)->toDateString();
        }else{
            $today = '';
            $todayForm = '';
            $laporanLabs = null;
        }

        // dd( $today  );
        // dd($todayForm);


        return view('admin.bersihkan', compact('laporanLabs','today', 'todayForm'));
    }

    public function deleteByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $date = $request->date;

        // Hapus data yang created_at < $date
        $deletedCount = LaporanLab::where('created_at', '<', $date)->delete();

        return back()
            ->with('success', "$deletedCount records older than $date deleted successfully.");
    }
}
