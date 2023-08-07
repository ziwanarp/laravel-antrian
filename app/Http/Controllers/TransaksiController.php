<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Antrian::where('layanan', 'transaksi')->get();
        $min = Antrian::where('layanan', 'transaksi')->min('no_antrian');
        $max = Antrian::where('layanan', 'transaksi')->max('no_antrian');

        return view('front.transaksi.index', [
            'transaksi' => $transaksi,
            'min' => $min,
            'max' => $max,

        ]);
    }

    public function storeTransaksi(Request $request)
    {
        if (Antrian::where('layanan', 'transaksi')->count() >= 5) {
            return redirect('transaksi')->with('error', 'Antrian maksimal 5 !');
        }

        $request['no_antrian'] = Antrian::where('layanan', 'transaksi')->max('no_antrian') + 1;
        Antrian::create($request->all());

        return redirect('/transaksi')->with('success', 'Antrian berhasil dibuat !');
    }

    public function cetakTransaksi(Antrian $antrian)
    {

        // return view('front.cetak.index', compact('antrian'));
        $pdf = Pdf::loadView('front.cetak.index', compact('antrian'));
        return $pdf->download('Antrian_' . $antrian->no_antrian . '_' . $antrian->layanan . '.pdf');
    }
}
