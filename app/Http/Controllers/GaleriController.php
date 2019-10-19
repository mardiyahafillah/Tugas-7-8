<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\KategoriGaleri;

class GaleriController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Galeri = Galeri::all();
        return view ('galeri.index',compact('Galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $KategoriGaleri = KategoriGaleri::pluck('nama','id');
        //
        return view('galeri.create',compact('KategoriGaleri'));
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
        Galeri::create($input);
        return redirect(route('galeri.index'));
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
        $Galeri = Galeri::find($id);
        return view ('galeri.show',compact('Galeri'));
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
        $Galeri = Galeri::find($id);
        $KategoriGaleri = KategoriGaleri::pluck('nama','id');
        if (empty($Galeri)){
            return redirect(route('galeri.index'));
        }

        return view ('galeri.edit',compact('Galeri','KategoriGaleri'));
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
        $Galeri= Galeri::find($id);
        $input = $request->all();
        if (empty($Galeri)){
            return redirect(route('galeri.index'));
        }
        $Galeri->update($input);
        return redirect(route('galeri.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Galeri = Galeri::find($id);
        if (empty($Galeri)){
            return redirect(route('galeri.index'));
        }
         $Galeri->delete();
         return redirect(route('galeri.index'));
    }
}
