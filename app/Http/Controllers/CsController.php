<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class CsController extends Controller
{
    public function index()
    {
        $cs = Antrian::where('layanan', 'cs')->get();
        $min = Antrian::where('layanan', 'cs')->min('no_antrian');
        $max = Antrian::where('layanan', 'cs')->max('no_antrian');

        return view('front.cs.index', [
            'cs' => $cs,
            'min' => $min,
            'max' => $max,

        ]);
    }

    public function storeCs(Request $request)
    {
        if (Antrian::where('layanan', 'cs')->count() >= 5) {
            return redirect('cs')->with('error', 'Antrian maksimal 5 !');
        }

        $request['no_antrian'] = Antrian::where('layanan', 'cs')->max('no_antrian') + 1;
        Antrian::create($request->all());

        return redirect('/cs')->with('success', 'Antrian berhasil dibuat !');
    }
}
