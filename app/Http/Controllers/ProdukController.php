<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Produk::all();
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
        $table = Produk::create([
            "nama_laptop" => $request -> nama_laptop, 
            "desc_laptop" => $request -> desc_laptop, 
            "merek_laptop" => $request -> merek_laptop,
            "berat_laptop" => $request -> berat_laptop,
            "harga_laptop" => $request -> harga_laptop,
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
        $table = Produk::show($id);
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
        $table = Produk::find($id);
        if($table){
            $table->nama_laptop = $request->nama_laptop ? $request->nama_laptop : $table->nama_laptop;
            $table->desc_laptop = $request->desc_laptop ? $request->desc_laptop : $table->desc_laptop;
            $table->merek_laptop = $request->merek_laptop ? $request->merek_laptop : $table->merek_laptop;
            $table->berat_laptop = $request->berat_laptop? $request->berat_laptop : $table->berat_laptop;
            $table->harga_laptop = $request->harga_laptop ? $request->harga_laptop : $table->harga_laptop;
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
        $table = Produk::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}
