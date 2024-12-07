<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class BerandaController extends Controller
{
    public function beranda() {
        $dataProduct = Produk::all();
        return view('beranda.index', compact('dataProduct'));
    }
}
