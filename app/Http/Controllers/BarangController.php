<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    //

    public function all(){
        return Barang::all();
    }

    public function show($id){
        return Barang::find($id);
    }

    public function store(Request $request){
        return Barang::create($request->all());
    }

    public function update($id, Request $request){
        $barang = Barang::find($id);
        $barang->update($request->all());
        return $barang;
    }

    public function delete($id){
        $barang = Barang::find($id);
        $barang->delete();
        return $barang;
    }
}
