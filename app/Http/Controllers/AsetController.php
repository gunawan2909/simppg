<?php

namespace App\Http\Controllers;

use App\Models\Kebutuhan;
use App\Models\Komponen;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    //komponenen
    public function indexKomponen()
    {
        $page = request(['pagination'][0]) ?? 50;
        return view('Aset.Komponen', [
            'panel' => 'aset',
            'komponen' => Komponen::filter(request(['search']))->orderBy('name', 'asc')->paginate($page),
            'search' => request(['search'][0]),
            'pagination' => $page
        ]);
    }

    public function storeKomponen(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'lokasi' => 'required',
        ]);
        Komponen::create($data);
        return back()->with('sukses', 'Data berhasil ditambahkan');
    }

    public function editKomponen($id)
    {
        $page = request(['pagination'][0]) ?? 50;

        return view('Aset.Komponen', [
            'panel' => 'aset',
            'komponen' => Komponen::filter(request(['search']))->orderBy('name', 'asc')->paginate($page),
            'search' => request(['search'][0]),
            'pagination' => $page

        ]);
    }
    public function updateKomponen($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'lokasi' => 'required',
        ]);
        Komponen::where('id', $id)->update($data);
        return redirect()->route('aset.komponen.index')->with('sukses', 'Data berhasil diubah');
    }
    public function deleteKomponen($id)
    {
        Komponen::where('id', $id)->delete();
        return back()->with('sukses', 'Data berhasil dihapus');
    }



    //alat
    public function indexAlat()
    {
        $page = request(['pagination'][0]) ?? 50;
        return view('Aset.Alat', [
            'panel' => 'aset',
            'alat' => Kebutuhan::where('jenis', 'alat')->filter(request(['search']))->orderBy('name', 'asc')->paginate($page),
            'search' => request(['search'][0]),
            'pagination' => $page
        ]);
    }

    public function storeAlat(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'kondisi' => 'required',
        ]);
        $data['jenis'] = "alat";
        Kebutuhan::create($data);
        return back()->with('sukses', 'Data berhasil ditambahkan');
    }

    public function editAlat($id)
    {
        $page = request(['pagination'][0]) ?? 50;

        return view('Aset.Alat', [
            'panel' => 'aset',
            'alat' => Kebutuhan::where('jenis', 'alat')->filter(request(['search']))->orderBy('name', 'asc')->paginate($page),
            'search' => request(['search'][0]),
            'pagination' => $page

        ]);
    }
    public function updateAlat($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'kondisi' => 'required',
        ]);
        Kebutuhan::where('id', $id)->update($data);
        return redirect()->route('aset.alat.index')->with('sukses', 'Data berhasil diubah');
    }
    public function deleteAlat($id)
    {
        Kebutuhan::where('id', $id)->delete();
        return back()->with('sukses', 'Data berhasil dihapus');
    }
    //bahan
    public function indexBahan()
    {
        $page = request(['pagination'][0]) ?? 50;
        return view('Aset.Bahan', [
            'panel' => 'aset',
            'bahan' => Kebutuhan::where('jenis', 'bahan')->filter(request(['search']))->orderBy('name', 'asc')->paginate($page),
            'search' => request(['search'][0]),
            'pagination' => $page
        ]);
    }

    public function storeBahan(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);
        $data['jenis'] = "bahan";

        Kebutuhan::create($data);
        return back()->with('sukses', 'Data berhasil ditambahkan');
    }

    public function editBahan($id)
    {
        $page = request(['pagination'][0]) ?? 50;

        return view('Aset.Bahan', [
            'panel' => 'aset',
            'bahan' => Kebutuhan::where('jenis', 'bahan')->filter(request(['search']))->orderBy('name', 'asc')->paginate($page),
            'search' => request(['search'][0]),
            'pagination' => $page
        ]);
    }
    public function updateBahan($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);
        Kebutuhan::where('id', $id)->update($data);
        return redirect()->route('aset.bahan.index')->with('sukses', 'Data berhasil diubah');
    }
    public function deleteBahan($id)
    {
        Kebutuhan::where('id', $id)->delete();
        return back()->with('sukses', 'Data berhasil dihapus');
    }
}
