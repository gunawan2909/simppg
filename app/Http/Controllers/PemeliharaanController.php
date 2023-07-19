<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Komplain;
use App\Models\Komponen;
use App\Models\Kebutuhan;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use App\Models\ListKebutuhan;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Support\Facades\Auth;

class PemeliharaanController extends Controller
{

    //Kegiatan Crud
    public function indexKegiatan()
    {
        $page = request(['pagination'][0]);
        return view('Pemeliharaan.Kegiatan', [
            'panel' => 'pemeliharaan',
            'kegiatan' => Kegiatan::filter(request(['search']))->paginate($page),
            'pagination' => $page,
            'search' => request(['search'][0])
        ]);
    }

    public function storeKegiatan(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        Kegiatan::create($data);
        return back();
    }

    public function deleteKegiatan($id)
    {
        Kegiatan::where('id', $id)->delete();
        return back();
    }

    //Komplain
    public function indexKomplain()
    {
        $bulan = request(['bulan'][0]) ?? date('m');
        $tahun = request(['tahun'][0]) ?? date('Y');


        if ($bulan == 0) {
            $tahun = $tahun - 1;
            $bulan = 12;
        }
        if ($bulan == 13) {
            $tahun = $tahun + 1;
            $bulan = 1;
        }
        $page = request(['pagination'][0]);
        if (Auth::user()->jabatan == "Karyawan") {
            $komplain = Komplain::latest()->filter(request(['search', 'day']))->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->where('user_id', Auth::user()->id)->paginate($page);
        } else {
            $komplain = Komplain::latest()->filter(request(['search', 'day']))->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->paginate($page);
        }
        return view('Pemeliharaan.Komplain', [
            'panel' => 'pemeliharaan',
            'komplain' => $komplain,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'pagination' => $page,
            'search' => request(['search'][0])
        ]);
    }

    public function addKomplain()
    {
        return view('Pemeliharaan.KomplainAdd', [
            'panel' => 'pemeliharaan',
            'komponen' => Komponen::all()
        ]);
    }
    public function storeKomplain(Request $request)
    {
        $data = $request->validate([
            'name' => 'requied',
            'komponen_id' => 'required',
            'image' => 'image|max:6000',
            'keterangan' => 'required'
        ]);
        $data['status'] = "Pengajuan";
        $data['user_id'] = Auth::user()->id;
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('Komplain');
        }
        Komplain::create($data);
        return redirect(route('pemeliharaan.komplain.index'));
    }

    public function viewKomplain($id)
    {
        return view('Pemeliharaan.KomplainDetail', [
            'panel' => 'pemeliharaan',
            'komplain' => Komplain::where('id', $id)->get()[0],
            'teknisi' => User::where('jabatan', 'Teknisi')->get(),
            'kegiatan' => Kegiatan::all()
        ]);
    }

    public function updateKomplain($id, Request $request)
    {
        $data = $request->validate([
            'teknisi_id' => 'required',
            'kegiatan_id' => 'required'
        ]);
        if (Komplain::where('id', $id)->get()[0]->pemeliharaan) {
            Komplain::where('id', $id)->get()[0]->pemeliharaan->update($data);
            Komplain::where('id', $id)->get()[0]->update(['status' => 'Dikerjakan']);
        } else {

            $data['komplain_id'] = $id;
            Pemeliharaan::create($data);
            Komplain::where('id', $id)->get()[0]->update(['status' => 'Dikerjakan']);
        }
        return redirect(route('pemeliharaan.komplain.index'));
    }

    //Pemeliharaan Add Data 

    public function indexPemeliharaan()
    {
        $bulan = request(['bulan'][0]) ?? date('m');
        $tahun = request(['tahun'][0]) ?? date('Y');


        if ($bulan == 0) {
            $tahun = $tahun - 1;
            $bulan = 12;
        }
        if ($bulan == 13) {
            $tahun = $tahun + 1;
            $bulan = 1;
        }
        $page = request(['pagination'][0]);

        return view('Pemeliharaan.Penanganan', [
            'panel' => 'pemeliharaan',
            'pemeliharaan' => Pemeliharaan::where('teknisi_id', Auth::user()->id)->filter(request(['search', 'day']))->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->paginate($page),
            'pagination' => $page,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'search' => request(['search'][0]),

        ]);
    }

    public function detailPemeliharaan($id)
    {
        return view('Pemeliharaan.PenangananDetail', [
            'panel' => 'pemeliharaan',
            'pemeliharaan' => Pemeliharaan::where('id', $id)->get()[0],
            'kebutuhan' => Kebutuhan::all(),

        ]);
    }

    public function addToolPemeliharaan($id, Request $request)
    {
        $data = $request->validate([
            'kebutuhan_id' => 'required',
            'jumlah' => 'required',
        ]);
        $kebutuhan = Kebutuhan::where('id', $data['kebutuhan_id'])->get()[0];
        if ($kebutuhan->jenis == "alat") {
            $data['jumlah'] = 1;
        }
        $data['pemeliharaan_id'] = $id;
        ListKebutuhan::create($data);
        return back();
    }

    public function deleteToolPemeliharaan($id)
    {
        ListKebutuhan::destroy($id);
        return back();
    }

    public function finishPemeliharaan($id)
    {
        Pemeliharaan::where('id', $id)->get()[0]->komplain->update(['status' => 'Selesai']);

        foreach (ListKebutuhan::where('pemeliharaan_id', $id)->get()[0] as $item) {
            if ($item->kebutuhan->jenis == "bahan") {
                $jumlah = $item->kebutuhan->jumlah - $item->jumlah;
                $item->kebutuhan->update(['jumlah' => $jumlah]);
            }
        }
        return back();
    }


    //Pelaporan 
    public function indexPelaporan()
    {
        $bulan = request(['bulan'][0]) ?? date('m');
        $tahun = request(['tahun'][0]) ?? date('Y');


        if ($bulan == 0) {
            $tahun = $tahun - 1;
            $bulan = 12;
        }
        if ($bulan == 13) {
            $tahun = $tahun + 1;
            $bulan = 1;
        }
        $page = request(['pagination'][0]);
        return view('Pemeliharaan.Pelaporan', [
            'panel' => 'pemeliharaan',
            'komplain' => Komplain::where('status', "Selesai")->filter(request(['search', 'day']))->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->paginate($page),
            'pagination' => $page,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'search' => request(['search'][0]),

        ]);
    }
    public function detailPelaporan($id)
    {
        return view('Pemeliharaan.PelaporanDetail', [
            'panel' => 'pemeliharaan',
            'pemeliharaan' => Pemeliharaan::where('id', $id)->get()[0],

        ]);
    }
    public function detailPelaporanPdf($id)
    {



        $pdf = app('dompdf.wrapper');
        $pdf->loadview('Pemeliharaan.PelaporanDetailPDF', [
            'pemeliharaan' => Pemeliharaan::where('id', $id)->get()[0],
        ]);

        return $pdf->download('Laporan Pemeliharaan ' . Pemeliharaan::where('id', $id)->get()[0]->komplain->komponen->name . '.pdf');
    }
}
