<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alamat;


class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Alamat::all();
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
        $table = Alamat::create([
            "desa" => $request -> desa, 
            "kecamatan" => $request -> kecamatan,
            "kabupaten" => $request -> kabupaten,
            "nomor_tlp" => $request -> nomor_tlp,
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
        $table = Alamat::show($id);
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
        $table = Alamat::find($id);
        if($table){
            $table->desa = $request->desa ? $request->desa : $table->desa;
            $table->kecamatan = $request->kecamatan ? $request->kecamatan : $table->kecamatan;
            $table->kabupaten = $request->kabupaten ? $request->kabupaten : $table->kabupaten;
            $table->nomor_tlp = $request->nomor_tlp ? $request->nomor_tlp : $table->nomor_tlp;
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
        $table = Alamat::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}
