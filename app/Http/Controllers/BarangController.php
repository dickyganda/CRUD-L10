<?php

namespace App\Http\Controllers;

use App\Models\Barang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    //
    public function index(){
        $barang = DB::table('m_barang')
        ->get();

        return view('barang.index', [
            'barang' => $barang
        ]);
    }

    public function create()
    {

        return view('barang.create');

    }

    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->KodeBarang = $request->KodeBarang;
        $barang->NamaBarang = $request->NamaBarang;
        $barang->save();

        return response()->json(array('status' => 'success', 'reason' => 'Sukses Tambah Data'));

    }

    public function edit($IdBarang)
    {

        $barang = DB::table('m_barang')->where('IdBarang',$IdBarang)->first();

        return view('barang.edit', [
            'barang' => $barang,
            ]);

    }

    public function update(Request $request, $IdBarang)
    {
        $barang = Barang::findOrFail($IdBarang);
        $barang->update([
            'NamaBarang'     => $request->NamaBarang,
        ]);

        return response()->json(array('status' => 'success', 'reason' => 'Sukses Edit Data'));

    }

    public function delete($IdBarang)

    {
        Barang::find($IdBarang)->delete();
        return response()->json(array('status' => 'success', 'reason' => 'Sukses Delete Data'));
    }

}
