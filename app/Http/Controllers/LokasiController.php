<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;
use App\Http\Response\GeneralResponse;
use App\Models\Drainase;
use App\Models\JalanLingkungan;
use App\Models\Pju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class LokasiController extends Controller
{
    public function index()
    {
        $page_title = 'Sipasauki - Disperkimtan Jeneponto';
        $page_description = 'Dashboard Admin';
        $breadcrumbs = ['Daftar Lokasi'];

        $lingkungan = DB::table('lingkungans')
            ->select('id', 'lingkungan',)
            ->get();

        return view('lokasi.index', compact('page_title', 'page_description', 'breadcrumbs', 'lingkungan'));
    }

    public function list()
    {
        $response = (new LokasiController)->getList();
        return $response;
    }

    public function getList()
    {
        $lokasi = DB::table("lokasis")
            ->join('lingkungans', 'lokasis.lingkungan_id', 'lingkungans.id')
            ->get();

        foreach ($lokasi as $key => $value) {
            $lingkungan = DB::table('lingkungans')->where('id', $value->lingkungan_id)->get();
            // foreach ($lingkungan as $index => $val) {
            //     $village = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kelurahan/{$val->desa_kel}");
            //     $district = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{$val->kecamatan}");
            //     $value->nama_kecamatan = $district['nama'];
            //     $value->nama_desa_kel = $village['nama'];
            //     $value->lingkungan = $val->lingkungan;
            // }
            $value->coordinat = "$value->lattitude, $value->longitude";
        }

        if ($lokasi) {
            return (new GeneralResponse)->default_json(true, 'success', $lokasi, 200);
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
        $page_title = 'Sipasauki - Disperkimtan Jeneponto';
        $page_description = 'Dashboard Admin';
        $breadcrumbs = ['Add Lokasi'];

        $lingkungan = DB::table('lingkungans')
            ->select('id', 'lingkungan',)
            ->get();

        return view('lokasi.add', compact('page_title', 'page_description', 'breadcrumbs', 'lingkungan'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lingkungan' => 'required',
            'lokasi' => 'required',
            'lattitude' => 'required',
            'longitude' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pju_baik' => 'required',
            'pju_sedang' => 'required',
            'pju_berat' => 'required',
            'pju_dibutuhkan' => 'required',
            'pju_terlayani' => 'required',
            'jalan_lingkungan_baik' => 'required',
            'jalan_lingkungan_sedang' => 'required',
            'jalan_lingkungan_berat' => 'required',
            'jalan_lingkungan_total' => 'required',
            'jalan_lingkungan_kebutuhan_1m' => 'required',
            'jalan_lingkungan_kebutuhan_2m' => 'required',
            'jalan_lingkungan_kebutuhan_3m' => 'required',
            'jalan_lingkungan_kebutuhan_3m+' => 'required',
            'jalan_lingkungan_terlayani' => 'required',
            'drainase_baik' => 'required',
            'drainase_sedang' => 'required',
            'drainase_berat' => 'required',
            'drainase_total' => 'required',
            'drainase_kebutuhan_40cm' => 'required',
            'drainase_kebutuhan_50cm' => 'required',
            'drainase_kebutuhan_60cm' => 'required',
            'drainase_terlayani' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['invalid' => $validator->errors()]);
        }

        $data = new Lokasi();
        $data->lingkungan_id = $request->lingkungan;
        $data->nama_lokasi = $request->lokasi;
        $data->lattitude = $request->lattitude;
        $data->longitude = $request->longitude;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $lokasiImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $lokasiImage);

            $data->image = "$lokasiImage";
        }

        $data->save();

        $pju = new Pju();
        $pju->lokasi_id = $data->id;
        $pju->baik = intval($request->pju_baik);
        $pju->sedang = intval($request->pju_sedang);
        $pju->berat = intval($request->pju_berat);
        $pju->kebutuhan = intval($request->pju_kebutuhan);
        $pju->terlayani = intval($request->pju_terlayani);
        $pju->save();

        $jalanLingkungan = new JalanLingkungan();
        $jalanLingkungan->lokasi_id = $data->id;
        $jalanLingkungan->baik = floatval(preg_replace('/[^\d\.]+/', '', $request->jalan_lingkungan_baik));
        $jalanLingkungan->sedang = floatval(preg_replace('/[^\d\.]+/', '', $request->jalan_lingkungan_sedang));
        $jalanLingkungan->berat = floatval(preg_replace('/[^\d\.]+/', '', $request->jalan_lingkungan_berat));
        $jalanLingkungan->total_panjang = floatval(preg_replace('/[^\d\.]+/', '', $request->jalan_lingkungan_total));
        $jalanLingkungan->kebutuhan_1m = floatval(preg_replace('/[^\d\.]+/', '', $request->jalan_lingkungan_kebutuhan_1m));
        $jalanLingkungan->kebutuhan_2m = floatval(preg_replace('/[^\d\.]+/', '', $request->jalan_lingkungan_kebutuhan_2m));
        $jalanLingkungan->kebutuhan_3m = floatval(preg_replace('/[^\d\.]+/', '', $request->jalan_lingkungan_kebutuhan_3m));
        $jalanLingkungan->kebutuhan_4m = floatval(preg_replace('/[^\d\.]+/', '', $request->jalan_lingkungan_kebutuhan_4m));
        $jalanLingkungan->terlayani = intval($request->jalan_lingkungan_terlayani);
        $jalanLingkungan->save();

        $drainase = new Drainase();
        $drainase->lokasi_id = $data->id;
        $drainase->baik = floatval(preg_replace('/[^\d\.]+/', '', $request->dranase_baik));
        $drainase->sedang = floatval(preg_replace('/[^\d\.]+/', '', $request->dranase_sedang));
        $drainase->berat = floatval(preg_replace('/[^\d\.]+/', '', $request->dranase_berat));
        $drainase->total_panjang = floatval(preg_replace('/[^\d\.]+/', '', $request->dranase_total));
        $drainase->kebutuhan_40cm = floatval(preg_replace('/[^\d\.]+/', '', $request->dranase_kebutuhan_40cm));
        $drainase->kebutuhan_50cm = floatval(preg_replace('/[^\d\.]+/', '', $request->dranase_kebutuhan_50cm));
        $drainase->kebutuhan_60cm = floatval(preg_replace('/[^\d\.]+/', '', $request->dranase_kebutuhan_60cm));
        $drainase->terlayani = intval($request->drainase_terlayani);
        $drainase->save();

        if ($data) {
            return (new GeneralResponse)->default_json(true, "Success", $data, 201);
        } else {
            return (new GeneralResponse)->default_json(false, "Error", $data, 403);
        }
    }

    public function show(Request $request, $id)
    {
        $pembelian = Lokasi::where('id', $id)->first();

        return $pembelian;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLokasiRequest  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLokasiRequest $request, Lokasi $lokasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        //
    }
}
