<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Checkout::all();
        // $data = ["Data" => $siswa];
        // return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            "id_laptop" => " Masukan id product",
            "id_user" => " Masukan id user",
            // "pembeli" => " Masukan nama pembeli",
            "jumlah_barang" => " Masukan jumlah barang",
            "harga" => " Masukan total harga",
            "desa" => " Masukan desa anda",
            "kecamatan" => " Masukan kecamatan anda",
            "kabupaten" => " Masukan kabupaten anda",
            "nomor_tlp" => " Masukan nomor telepon atau ini saya anggap penipu"
        ];
        $validasi = Validator::make($request->all(), [
            "id_laptop" => "required",
            "id_user" => "required",
            // "pembeli" => "required",
            "jumlah_barang" => "required",
            "harga" => "required",
            "desa" => "required",
            "kecamatan" => "required",
            "kabupaten" => "required",
            "nomor_tlp" => "required"
        ], $message);
        if ($validasi->fails()) {
            return $validasi->errors();
        }
        $produk = Checkout::create($validasi->validate());
        $produk->save();

        return response()->json([
            "message" => "Load data success",
            "data" => $produk
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
