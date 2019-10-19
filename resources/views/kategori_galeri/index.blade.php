@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori Galeri</div>
                <div class="card-body">
                <a href="{!!route('kategori_galeri.create')!!}">Tambah Data</a>
                <table class="table table-bordered">
                    <thead class="bg-danger">
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">User_id</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $kategori_galeri as $item)
                        <tr>
                        <td>{!! $item->id !!}</td>
                        <td>{!! $item->nama !!}</td>
                        <td>{!! $item->users_id !!}</td>
                        <td><a href="{!!route('kategori_galeri.show',[$item->id])!!}">Lihat</a></td>
                        <td><a href="{!! route('kategori_galeri.edit',[$item->id]) !!}" class="btn btn-primary">edit</a></td>

                        <td>
								{!! Form::open(['route' => ['kategori_galeri.destroy',$item->id], 'method' => 'delete']); !!}
					            {!! Form::submit('Hapus',['class'=>'btn btn-danger']); !!}
					            {!! Form::close() !!}
							</td>
                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
		@endsection