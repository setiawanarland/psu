<?php

namespace App\Http\Controllers;

use App\Http\Response\GeneralResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index()
    {
        $data = DB::table('lokasis')
            ->select(
                'lokasis.*',
                'lingkungans.*',
                'pjus.baik as pju_baik',
                'pjus.sedang as pju_sedang',
                'pjus.berat as pju_berat',
                'pjus.kebutuhan as pju_kebutuhan',
                'pjus.terlayani as pju_terlayani',
                'jalan_lingkungans.baik as jalan_lingkungan_baik',
                'jalan_lingkungans.sedang as jalan_lingkungan_sedang',
                'jalan_lingkungans.berat as jalan_lingkungan_berat',
                'jalan_lingkungans.total_panjang as jalan_lingkungan_total',
                'jalan_lingkungans.kebutuhan_1m as jalan_lingkungan_kebutuhan_1m',
                'jalan_lingkungans.kebutuhan_2m as jalan_lingkungan_kebutuhan_2m',
                'jalan_lingkungans.kebutuhan_3m as jalan_lingkungan_kebutuhan_3m',
                'jalan_lingkungans.kebutuhan_4m as jalan_lingkungan_kebutuhan_4m',
                'jalan_lingkungans.terlayani as jalan_lingkungan_terlayani',
                'drainases.baik as drainase_baik',
                'drainases.sedang as drainase_sedang',
                'drainases.berat as drainase_berat',
                'drainases.total_panjang as drainase_total',
                'drainases.kebutuhan_40cm as drainase_kebutuhan_40cm',
                'drainases.kebutuhan_50cm as drainase_kebutuhan_50cm',
                'drainases.kebutuhan_60cm as drainase_kebutuhan_60cm',
                'drainases.terlayani as drainase_terlayani',
            )
            ->join('lingkungans', 'lokasis.lingkungan_id', 'lingkungans.id')
            ->join('pjus', 'lokasis.id', 'pjus.lokasi_id')
            ->join('jalan_lingkungans', 'lokasis.id', 'jalan_lingkungans.lokasi_id')
            ->join('drainases', 'lokasis.id', 'drainases.lokasi_id')
            ->get();

        foreach ($data as $key => $value) {
            // return $value;
            $village = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kelurahan/{$value->desa_kel}");
            $district = Http::get("https://dev.farizdotid.com/api/daerahindonesia/kecamatan/{$value->kecamatan}");
            $value->nama_kecamatan = $district['nama'];
            $value->nama_desa_kel = $village['nama'];
        }

        // return $data;
        return view('page.index', compact('data'));
    }

    public function dashboard()
    {
        $page_title = 'Sipasauki - Disperkimtan Jeneponto';
        $page_description = 'Dashboard Admin';
        $breadcrumbs = ['Dashboard'];



        return view('Page.dashboard', compact('page_title', 'page_description', 'breadcrumbs'));
    }

    public function user($username, $email, $pass)
    {
        // return "$username, $pass";
        $user = User::create([
            'username'    => "$username",
            'email'    => "$email",
            'password'   =>  Hash::make($pass),
        ]);

        return ($user) ? (new GeneralResponse)->default_json(true, 'User created!', $user, 200) : (new GeneralResponse)->default_json(true, 'User not created!', null, 401);
    }
}
