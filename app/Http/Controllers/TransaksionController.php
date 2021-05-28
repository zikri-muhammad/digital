<?php

namespace App\Http\Controllers;

use App\Transaksion;
use App\Http\Requests\TransaksionRequest;
use App\Produk;
use App\TransaksionDetail;
use App\TypeTransaksions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaksion::all();
        return view('transaksions.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeTransaksions = TypeTransaksions::all();
        $produk           = Produk::all();

        // dd($typeTransaksions);
        return view('transaksions.create')->with([
            'typeTransaksions' => $typeTransaksions,
            'produk' => $produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $transaksion = new Transaksion;

        $typeTransaksions = $request->type_transaksi;

        $transaksion->user_id = 1;
        $transaksion->name = $request->name;
        $transaksion->type_transaksi_id = $typeTransaksions;
        // $produk_id = $request->post('produk_id');
        // $stok = $request->post('stok');
        $transaksion->save();
        $LastInsertId = $transaksion->id;

        
        $produk_id       = $request->produk_id;
        // $transaksion_id  = $request->transaksion_id;
        $stok            = $request->stok;
        // dd($stok);
        // get produk 
        $produks = Produk::all();
        foreach ($produks as $produk)
        {
            $stokProduk = $produk->stok;
            $id         = $produk->id;
        }
        // $produkSave = new Produk;
    
        // save transaksion detail 
        foreach($produk_id as $key => $no)
        {
             
            $transaksionDetail = new TransaksionDetail;

            $transaksionDetail->produk_id       = $no;
            $transaksionDetail->transaksion_id  = $LastInsertId;
            $transaksionDetail->stok            = $stok[$key];
// dd($stok);
// dd($produk_id);
            if($typeTransaksions != 2){
                // update stok
                $post = Produk::find($no);
                $hasil = (int)$post->stok + (int)$stok[$key];
                $post->stok = $hasil;
                $post->save();

                // Model::create($input);
                // dd($transaksionDetail);

                $transaksionDetail->save();
                DB::commit();
            } else{
                if($stokProduk < $stok[$key]){
                    // $request->session()->flash('error', 'Stok Tidak Mencukupi');
                    DB::rollback();
                    return redirect('transaksions/create')->with('error', 'Stok Tidak Mencukupi');
                } else{
                    // Model::create($input);
                    $post = Produk::find($id);
                    $hasil = (int)$stokProduk - (int)$stok[$key];
                    $post->stok = $hasil;
                    $post->save();
                    // dd($transaksionDetail);
                    $transaksionDetail->save();
                    DB::commit();
                }
            }

            

        }
        return redirect()->route('transaksions.index');

        // $data = $request->all();
        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksion  $transaksion
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksion $transaksion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksion  $transaksion
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksion $transaksion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksion  $transaksion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksion $transaksion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksion  $transaksion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksion $id)
    {
            
    }

    public function transaksionDetail($id){
        $transaksion = Transaksion::findorFail($id);
        $items   = TransaksionDetail::with('transaksions')
            ->where('transaksion_id', $id)
            ->get();
        
        return view('transaksions.transaksion-detail')->with([
            'transaksion'   => $transaksion,
            'items'     => $items
        ]);
    }
}
