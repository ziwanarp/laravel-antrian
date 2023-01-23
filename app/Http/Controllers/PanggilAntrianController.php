<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class PanggilAntrianController extends Controller
{
    public function index()
    {

        $min_trx = Antrian::where('layanan', 'transaksi')->min('no_antrian');
        $max_trx = Antrian::where('layanan', 'transaksi')->max('no_antrian');
        $transaksi = Antrian::where('layanan', 'transaksi')->where('no_antrian', $min_trx)->get();

        $min_cs = Antrian::where('layanan', 'cs')->min('no_antrian');
        $max_cs = Antrian::where('layanan', 'cs')->max('no_antrian');
        $cs = Antrian::where('layanan', 'cs')->where('no_antrian', $min_cs)->get();

        if ($transaksi->count() > 0 && $cs->count() > 0) {
            return view('front.panggil.index', [
                'transaksi' => $transaksi[0],
                'cs' => $cs[0],
                'min_cs' => $min_cs,
                'max_cs' => $max_cs,
                'min_trx' => $min_trx,
                'max_trx' => $max_trx,

            ]);
        } else if ($transaksi->count() > 0) {
            return view('front.panggil.index', [
                'transaksi' => $transaksi[0],
                'min_trx' => $min_trx,
                'max_trx' => $max_trx,
            ]);
        } else if ($cs->count() > 0) {
            return view('front.panggil.index', [
                'cs' => $cs[0],
                'min_cs' => $min_cs,
                'max_cs' => $max_cs,
            ]);
        } else {
            return view('front.panggil.index');
        }
    }

    public function destroyTransaksi($transaksi)
    {
        Antrian::where('layanan', 'transaksi')->where('no_antrian', $transaksi)->delete();
        return redirect('/panggil-antrian');
    }

    public function destroyCs($cs)
    {
        Antrian::where('layanan', 'cs')->where('no_antrian', $cs)->delete();
        return redirect('/panggil-antrian');
    }
}
