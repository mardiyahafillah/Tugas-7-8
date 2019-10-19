<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\KategoriBerita;

class BeritaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Berita = Berita::all();
        return view ('berita.index',compact('Berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $KategoriBerita = KategoriBerita::pluck('nama','id');
        //
        return view('berita.create',compact('KategoriBerita'));
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
        Berita::create($input);
        return redirect(route('berita.index'));
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
        $Berita = Berita::find($id);
        return view ('berita.show',compact('Berita'));
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
        $Berita = Berita::find($id);
        $KategoriBerita = KategoriBerita::pluck('nama','id');
        if (empty($Berita)){
            return redirect(route('berita.index'));
        }

        return view ('berita.edit',compact('Berita','KategoriBerita'));
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
        $Berita = Berita::find($id);
        $input = $request->all();
        if (empty($Berita)){
            return redirect(route('berita.index'));
        }
        $Berita->update($input);
        return redirect(route('berita.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Berita = Berita::find($id);
        if (empty($Berita)){
            return redirect(route('berita.index'));
        }
         $Berita->delete();
         return redirect(route('berita.index'));
    }
}
