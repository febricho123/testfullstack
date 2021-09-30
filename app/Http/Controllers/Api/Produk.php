<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pcontroller;
class Produk extends Controller
{
   

    public function index(){
    	return Produk::all();
    }

    public function create(Request $request)
    {
    	$produk = new Produk;
    	$produk->nama_produk = $request ->nama_produk;
    	$produk->harga = $request ->harga;
    	$produk->save();
    	return "Data ditambahkan";
    }

    public function update(Request $request, $id)
    {
    	$nama_produk = $request->nama_produk;
    	$harga = $request ->harga;
    	$produk = Produk::find($id);
    	$produk->nama_produk = $nama_produk;
    	$produk->harga = $harga;
    	$produk->save();
    	return "Data diubah";
    }

    public function delete($id)
    {
    	$produk = Produk::find($id);
    	$produk->delete();
    	return "Data dihapus"
    }
    //
}
