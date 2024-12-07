<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{

    public function addProduct() {
        $dataProduct = Produk::all();
        return view('product.formInputData', compact('dataProduct'));
    }
    public function produk(Request $request) 
    {
        try {
                      
            $dataHasBeen = Produk::all();
            foreach ($dataHasBeen as $data) { 
                if ($data->kode_produk == $request['kode_produk']) {

                    $rules = [
                        'kode_produk' => 'required',
                        'namaProduk' => 'required',
                        'hargaBeli' => 'required|numeric',
                        'hargaJual' => 'required|numeric',
                        'statusProduk' => 'required',
                        'kelompokProduk' => 'required',
                        'stok' => 'required|numeric'
                    ];

                    if($request->kodeProduk != $data->slug ) {
                        $rules['kode_produk'] = 'required|unique:produk';
                    }

                    $validator = Validator::make($request->all(), $rules);
                    
                    if($validator->fails()) {
                        return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput();
                    }

                    $data->kode_produk = $request['kode_produk'];
                    $data->nama_produk = $request['namaProduk']; 
                    $data->harga_beli = $request['hargaBeli']; 
                    $data->harga_jual = $request['hargaJual']; 
                    $data->status_produk = $request['statusProduk']; 
                    $data->kelompok_produk = $request['kelompokProduk']; 
                    $data->stok = $request['stok']; 
                    $data->update();
                    return redirect()->route('beranda.beranda')->with('success', 'Data produk berhasil disimpan');
                }
            }       

            $validator = Validator::make($request->all(), [
                'kode_produk' => 'required|unique:produk',
                'namaProduk' => 'required',
                'hargaBeli' => 'required|numeric',
                'hargaJual' => 'required|numeric',
                'statusProduk' => 'required',
                'kelompokProduk' => 'required',
                'stok' => 'required|numeric'
            ]);
            
            if($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }
            $saveProduk = new Produk;     
            $saveProduk->kode_produk = $request['kode_produk'];
            $saveProduk->nama_produk = $request['namaProduk']; 
            $saveProduk->harga_beli = $request['hargaBeli']; 
            $saveProduk->harga_jual = $request['hargaJual']; 
            $saveProduk->status_produk = $request['statusProduk']; 
            $saveProduk->kelompok_produk = $request['kelompokProduk']; 
            $saveProduk->stok = $request['stok']; 
            $saveProduk->save();
            return redirect()->route('beranda.beranda')->with('success', 'Data produk berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function deteleProduk($id)
    {
        try {
            $deleted = Produk::where('id', $id)->delete();
            return redirect()->route('beranda.beranda')->with('success', 'berhasil hapus data');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    } 

    public function editProduct($id){
        $dataProduct = Produk::where('id', $id)->first();
        return view('product.formEditData', compact('dataProduct'));
    }

    public function updateProduct(Request $request, $id) {
        try {
            $data = Produk::where('id', $id)->first();
        $rules = [
            'kode_produk' => 'required',
            'namaProduk' => 'required',
            'hargaBeli' => 'required|numeric',
            'hargaJual' => 'required|numeric',
            'statusProduk' => 'required',
            'kelompokProduk' => 'required',
            'stok' => 'required|numeric'
        ];

        if($request->kodeProduk != $data->slug ) {
            $rules['kode_produk'] = 'required|unique:produk';
        }

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data->kode_produk = $request['kode_produk'];
        $data->nama_produk = $request['namaProduk']; 
        $data->harga_beli = $request['hargaBeli']; 
        $data->harga_jual = $request['hargaJual']; 
        $data->status_produk = $request['statusProduk']; 
        $data->kelompok_produk = $request['kelompokProduk']; 
        $data->stok = $request['stok']; 
        $data->update();
        return redirect()->route('beranda.beranda')->with('success', 'Data produk berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
