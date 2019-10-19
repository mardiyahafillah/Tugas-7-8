<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriArtikel;
class KategoriArtikelController extends Controller
{
    public function index()
    {

        $kategori_artikel=KategoriArtikel::all();
        
        return view('kategori_artikel.index',compact('kategori_artikel'));
    }
    public function create()
    {
        return view('kategori_artikel.create');
    }
    public function show($id)
    {
        $kategori_artikel=KategoriArtikel::find($id);
        return view('kategori_artikel.show',compact('kategori_artikel'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        KategoriArtikel::create($input);
        return redirect(route('kategori_artikel.index'));
    }
    public function edit($id)
    {
        //
        $KategoriArtikel = KategoriArtikel::find($id);
       
        if (empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        return view ('kategori_artikel.edit',compact('KategoriArtikel'));
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
        $KategoriArtikel = KategoriArtikel::find($id);
        $input = $request->all();
        if (empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }
        $KategoriArtikel->update($input);
        return redirect(route('kategori_artikel.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $KategoriArtikel = KategoriArtikel::find($id);
        if (empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }
         $KategoriArtikel->delete();
         return redirect(route('kategori_artikel.index'));
    }
}
