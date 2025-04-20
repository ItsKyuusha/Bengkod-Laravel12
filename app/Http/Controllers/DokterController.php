<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function dashboard()
    {
        $jadwalHariIni = Periksa::with('pasien')
            ->where('id_dokter', Auth::id())
            ->whereDate('tgl_periksa', now())
            ->orderBy('tgl_periksa')
            ->get();

        return view('dokter.dashboard', compact('jadwalHariIni'));
    }

    public function listPemeriksaan()
    {
        $data = Periksa::with('pasien')
            ->where('id_dokter', Auth::id())
            ->whereNull('catatan')
            ->orderBy('tgl_periksa')
            ->get();

        return view('dokter.periksa.index', compact('data'));
    }

    public function formPemeriksaan($id)
    {
        $periksa = Periksa::with('pasien')->findOrFail($id);
        $obats = Obat::all();

        return view('dokter.periksa.form', compact('periksa', 'obats'));
    }

    public function simpanPemeriksaan(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required',
            'biaya_periksa' => 'required|numeric',
            'obat' => 'array'
        ]);

        $periksa = Periksa::findOrFail($id);
        $periksa->catatan = $request->catatan;
        $periksa->biaya_periksa = $request->biaya_periksa;
        $periksa->save();

        $periksa->obats()->sync($request->obat);

        return redirect()->route('dokter.periksa')->with('success', 'Pemeriksaan berhasil disimpan');
    }

    public function riwayat()
    {
        $riwayat = Periksa::with(['pasien', 'obats'])
            ->where('id_dokter', Auth::id())
            ->whereNotNull('catatan')
            ->orderByDesc('tgl_periksa')
            ->get();

        return view('dokter.riwayat.index', compact('riwayat'));
    }

    public function kelolaObat()
    {
        $obats = Obat::orderBy('nama_obat')->get();
        return view('dokter.obat.index', compact('obats'));
    }

    public function tambahObat(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|numeric'
        ]);

        Obat::create($request->all());

        return redirect()->route('dokter.obat')->with('success', 'Obat berhasil ditambahkan');
    }

    public function editObat($id)
    {
        $obat = Obat::findOrFail($id);
        return view('dokter.obat.edit', compact('obat'));
    }

    public function updateObat(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('dokter.obat')->with('success', 'Obat berhasil diperbarui');
    }

    public function hapusObat($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('dokter.obat')->with('success', 'Obat berhasil dihapus');
    }

    public function profil()
    {
        return view('dokter.profile');
    }
}
