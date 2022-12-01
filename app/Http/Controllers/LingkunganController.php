<?php

namespace App\Http\Controllers;

use App\Http\Response\GeneralResponse;
use App\Models\Lingkungan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LingkunganController extends Controller
{
    public function index()
    {
        $page_title = 'Sipasauki - Disperkimtan Jeneponto';
        $page_description = 'Dashboard Admin';
        $breadcrumbs = ['Daftar Lingkungan'];

        // $regency = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/districts/7304.json');
        // return $regency;

        return view('lingkungan.index', compact('page_title', 'page_description', 'breadcrumbs'));
    }

    public function list()
    {
        $response = (new LingkunganController)->getList();
        return $response;
    }

    public function getList()
    {
        $lingkungan = DB::table("lingkungans")
            ->get();

        // foreach ($lingkungan as $key => $value) {
        //     $district = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{$value->kecamatan}");
        //     $village = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kelurahan/{$value->desa_kel}");
        //     $value->nama_kecamatan = $district['nama'];
        //     $value->nama_desa_kel = $village['nama'];
        // }

        if ($lingkungan) {
            return (new GeneralResponse)->default_json(true, 'success', $lingkungan, 200);
        } else {
            return (new GeneralResponse)->default_json(false, 'error', null, 401);
        }
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
        $validator = validator::make($request->all(), [
            'kecamatan' => 'required',
            'desa_kel' => 'required',
            'nama_kec' => 'required',
            'nama_deskel' => 'required',
            'lingkungan' => 'required',
            'nama_kepala' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['invalid' => $validator->errors()]);
        }

        $data = new Lingkungan();
        $data->kecamatan = $request->kecamatan;
        $data->desa_kel = $request->desa_kel;
        $data->nama_kec = $request->nama_kec;
        $data->nama_deskel = $request->nama_deskel;
        $data->lingkungan = $request->lingkungan;
        $data->nama_kepala = $request->nama_kepala;
        $data->save();

        if ($data) {
            return (new GeneralResponse)->default_json(true, "Success", $data, 201);
        } else {
            return (new GeneralResponse)->default_json(false, "Error", $data, 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lingkungan  $lingkungan
     * @return \Illuminate\Http\Response
     */
    public function show(Lingkungan $lingkungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lingkungan  $lingkungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lingkungan $lingkungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lingkungan  $lingkungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lingkungan $lingkungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lingkungan  $lingkungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lingkungan $lingkungan)
    {
        //
    }
}
