<?php

namespace App\Http\Controllers;

use App\Kategori_produk;
use App\Http\Requests\Kategori_produkRequest;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kategori_produk::all();
        return view('kategori-produk.index')->with([
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
        return view('kategori-produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Kategori_produkRequest $request)
    {
        //
        $data = $request->all();
// dd($data);
        Kategori_produk::create($data);
        return redirect()->route('kategori-produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori_produk  $kategori_produk
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori_produk $kategori_produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori_produk  $kategori_produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Kategori_produk::findOrFail($id);
        // dd($item);

        return view('kategori-produk.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori_produk  $kategori_produk
     * @return \Illuminate\Http\Response
     */
    public function update(Kategori_produkRequest $request, $id)
    {
        //
        $data = $request->all();

        $item = Kategori_produk::findOrFail($id);
        $item->update($data);
        return redirect()->route('kategori-produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori_produk  $kategori_produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kategori_produk::findOrFail($id);
        $item->delete();

        return redirect()->route('kategori-produk.index');
    }
}
