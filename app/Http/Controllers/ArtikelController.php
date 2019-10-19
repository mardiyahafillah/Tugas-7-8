<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\KategoriArtikel;

class ArtikelController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Artikel = Artikel::all();
        return view ('artikel.index',compact('Artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $KategoriArtikel = KategoriArtikel::pluck('nama','id');
        //
        return view('artikel.create',compact('KategoriArtikel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        Artikel::create($input);
        return redirect(route('artikel.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Artikel = Artikel::find($id);
        return view ('artikel.show',compact('Artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Artikel = Artikel::find($id);
        $KategoriArtikel = KategoriArtikel::pluck('nama','id');
        if (empty($Artikel)){
            return redirect(route('artikel.index'));
        }

        return view ('artikel.edit',compact('Artikel','KategoriArtikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Artikel = Artikel::find($id);
        $input = $request->all();
        if (empty($Artikel)){
            return redirect(route('artikel.index'));
        }
        $Artikel->update($input);
        return redirect(route('artikel.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Artikel = Artikel::find($id);
        if (empty($Artikel)){
            return redirect(route('artikel.index'));
        }
         $Artikel->delete();
         return redirect(route('artikel.index'));
    }
}
