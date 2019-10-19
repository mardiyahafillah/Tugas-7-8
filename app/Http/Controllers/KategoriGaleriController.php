<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriGaleri;
class KategoriGaleriController extends Controller
{
    public function index()
    {

        $kategori_galeri=KategoriGaleri::all();
        
        return view('kategori_galeri.index',compact('kategori_galeri'));
    }
    public function create()
    {
        return view('kategori_galeri.create');
    }
    public function show($id)
    {
        $kategori_galeri=KategoriGaleri::find($id);
        return view('kategori_galeri.show',compact('kategori_galeri'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        KategoriGaleri::create($input);
        return redirect(route('kategori_galeri.index'));
    }
    public function edit($id)
    {
        //
        $KategoriGaleri = KategoriGaleri::find($id);
       
        if (empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        return view ('kategori_galeri.edit',compact('KategoriGaleri'));
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
        $KategoriGaleri = KategoriGaleri::find($id);
        $input = $request->all();
        if (empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }
        $KategoriGaleri->update($input);
        return redirect(route('kategori_galeri.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $KategoriGaleri = KategoriGaleri::find($id);
        if (empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }
         $KategoriGaleri->delete();
         return redirect(route('kategori_galeri.index'));
    }
}
