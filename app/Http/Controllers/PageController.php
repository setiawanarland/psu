<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
