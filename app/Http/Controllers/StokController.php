<?php

namespace App\Http\Controllers;

use App\Models\Stok;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokController extends Controller
{
    //
    public function index(){
        $stok = DB::table('m_stok')
        ->join('m_barang', 'm_barang.IdBarang', '=', 'm_stok.IdBarang')
        ->get();

        return view('stok.index', [
            'stok' => $stok
        ]);
    }

    public function create()
    {
        $barang = DB::table('m_barang')
        ->get();

        return view('stok.create',[
            'barang' => $barang
        ]);

    }

    public function store(Request $request)
    {
        $barang = new Stok();
        $barang->IdBarang = $request->IdBarang;
        $barang->JumlahStok = $request->JumlahStok;
        $barang->CreatedAt = Carbon::now();
        $barang->save();

        return response()->json(array('status' => 'success', 'reason' => 'Sukses Tambah Data'));

    }
}
