<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;
use App\Barang;

class PembelianController extends Controller
{
    //
    public function all(){
        return Pembelian::all();
    }

    public function show($id){
        return Pembelian::find($id);
    }

    public function store(Request $request){
        return Pembelian::create($request->all());
    }

    public function update($id, Request $request){
        $pembelian = Pembelian::find($id);
        $pembelian->update($request->all());
        return $pembelian;
    }

    public function delete($id){
        $pembelian = Pembelian::find($id);
        $pembelian->delete();
        return 204;
    }

    public function addPembelian(){
        $barangs = Barang::orderBy('created_at', 'DESC')->get();
        return view('pembelian.add', compact('barangs'));
    }

    public function getBarang($id){
        $barangs = Barang::findOrFail($id);
        return response()->json($barangs, 200);
    }
}
