<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;

class PasienController extends Controller
{
    public function dashboard()
    {
        $jadwalHariIni = Periksa::with('dokter')
            ->where('id_pasien', Auth::id())
            ->whereDate('tgl_periksa', now())
            ->orderBy('tgl_periksa', 'asc')
            ->get();

        return view('pasien.dashboard', compact('jadwalHariIni'));
    }

    public function periksaForm()
    {
        $dokters = User::where('role', 'dokter')->get();
        return view('pasien.periksa.form', compact('dokters'));
    }

    public function periksaStore(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:users,id',
            'tgl_periksa' => 'required|date',
        ]);

        Periksa::create([
            'id_pasien' => Auth::id(),
            'id_dokter' => $request->id_dokter,
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => null,
            'biaya_periksa' => 150000, // default biaya
        ]);

        return redirect()->route('pasien.dashboard')->with('success', 'Berhasil mendaftar pemeriksaan!');
    }

    public function riwayat()
    {
        $riwayat = Periksa::with(['dokter', 'obats'])
            ->where('id_pasien', Auth::id())
            ->whereNotNull('catatan')
            ->orderBy('tgl_periksa', 'desc')
            ->get();

        return view('pasien.riwayat.index', compact('riwayat'));
    }

}
