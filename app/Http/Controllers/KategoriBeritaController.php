<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriBerita;
class KategoriBeritaController extends Controller
{
    public function index()
    {

        $kategori_berita=KategoriBerita::all();
        
        return view('kategori_berita.index',compact('kategori_berita'));
    }
    public function create()
    {
        return view('kategori_berita.create');
    }
    public function show($id)
    {
        $kategori_berita=KategoriBerita::find($id);
        return view('kategori_berita.show',compact('kategori_berita'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        KategoriBerita::create($input);
        return redirect(route('kategori_berita.index'));
    }
    public function edit($id)
    {
        //
        $KategoriBerita = KategoriBerita::find($id);
       
        if (empty($KategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }

        return view ('kategori_berita.edit',compact('KategoriBerita'));
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
        $KategoriBerita = KategoriBerita::find($id);
        $input = $request->all();
        if (empty($KategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }
        $KategoriBerita->update($input);
        return redirect(route('kategori_berita.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $KategoriBerita = KategoriBerita::find($id);
        if (empty($KategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }
         $KategoriBerita->delete();
         return redirect(route('kategori_berita.index'));
    }
}
