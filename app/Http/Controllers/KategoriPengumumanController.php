<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriPengumuman;
class KategoriPengumumanController extends Controller
{
    public function index()
    {

        $kategori_pengumuman=KategoriPengumuman::all();
        
        return view('kategori_pengumuman.index',compact('kategori_pengumuman'));
    }
    public function create()
    {
        return view('kategori_pengumuman.create');
    }
    public function show($id)
    {
        $kategori_pengumuman=KategoriPengumuman::find($id);
        return view('kategori_pengumuman.show',compact('kategori_pengumuman'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        KategoriPengumuman::create($input);
        return redirect(route('kategori_pengumuman.index'));
    }
    public function edit($id)
    {
        //
        $KategoriPengumuman = KategoriPengumuman::find($id);
       
        if (empty($KategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }

        return view ('kategori_pengumuman.edit',compact('KategoriPengumuman'));
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
        $KategoriPengumuman = KategoriPengumuman::find($id);
        $input = $request->all();
        if (empty($KategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }
        $KategoriPengumuman->update($input);
        return redirect(route('kategori_pengumuman.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $KategoriPengumuman = KategoriPengumuman::find($id);
        if (empty($KategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }
         $KategoriPengumuman->delete();
         return redirect(route('kategori_pengumuman.index'));
    }
}
