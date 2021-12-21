<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjekWisata;
use Illuminate\Support\Facades\DB;

class ObjekWisataController extends Controller
{
    // show all objek wisata
    public function show()
    {
        $datas = DB::table('objek_wisata')->selectRaw("id, X(lokasi) AS longitude, Y(lokasi) AS latitude, nama, alamat")->get();

        return view('welcome')->with('datas', $datas);
    }

    // input data objek wisata
    public function store(Request $request)
    {
        $data = ObjekWisata::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kategori' => $request->kategori,
            'lokasi' => DB::raw("(GeomFromText('POINT($request->longitude $request->latitude)'))")
        ]);

        return redirect()->route('show');
    }

    // search objek wisata
    public function search(Request $request)
    {
        $datas = DB::table('objek_wisata')->selectRaw("id, X(lokasi) AS longitude, Y(lokasi) AS latitude, nama, alamat")->where('nama', 'like', '%'. $request->keyword . '%')->get();
        
        return view('welcome')->with('datas', $datas);
    }

    // filter by category
    public function category($category)
    {
        $datas = ObjekWisata::selectRaw("id, X(lokasi) AS longitude, Y(lokasi) AS latitude, nama, alamat")->where('kategori', $category)->get();

        return view('welcome')->with('datas', $datas);
    }
}
