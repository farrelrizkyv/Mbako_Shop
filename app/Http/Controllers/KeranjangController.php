<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Keranjang::all();
        // $data = ["Data" => $siswa];
        // return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Keranjang::create([
            "pembeli" => $request -> pembeli,
            "nama_barang" => $request -> nama_barang, 
            "jumlah_barang" => $request -> jumlah_barang, 
            "harga" => $request -> harga,
        ]);
        return response()->json([
            "message" => "store success",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Keranjang::show($id);
        if ($table) {
            return $table ;
        }else{
            return [ "message" => "Data not found "];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Keranjang::find($id);
        if($table){
            $table->pembeli = $request->pembeli ? $request->pembeli : $table->pembeli;
            $table->nama_barang = $request->nama_barang ? $request->nama_barang : $table->nama_barang;
            $table->jumlah_barang = $request->jumlah_barang ? $request->jumlah_barang : $table->jumlah_barang;
            $table->harga = $request->harga ? $request->harga: $table->harga;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found "];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Keranjang::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}
