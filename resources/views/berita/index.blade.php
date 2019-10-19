@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">data</div>
                <div class="card-body">
                    <a href="{!! route('berita.create') !!}" class="btn btn-primary">Tambah Data</a><br>
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Isi</th>
                            <th scope="col">Users Id</th>
                            <th scope="col">Kategori Berita Id</th>
                            <th scope="col">Created</th>
                            <th scope="col">Updated</th>
                        </tr>
                        </thead>
                    @foreach($Berita as $item)
                        <tbody>
                        <tr>
                            <td>{!! $item->judul !!}</td>
                            <td>{!! $item->isi !!}</td>
                            <td>{!! $item->users_id !!}</td>
                            <td>{!! $item->kategori_berita_id !!}</td>
                            <td>{!! $item->created_at !!}</td>
                            <td>{!! $item->updated_at !!}</td>
                            <td><a href="{!! route('berita.show',[$item->id]) !!}" class="btn btn-primary">Lihat</a></td>
                            <td><a href="{!! route('berita.edit',[$item->id]) !!}" class="btn btn-primary">edit</a></td>
                            <td>
                                {!! Form::open(['route' => ['berita.destroy',$item->id], 'method' => 'delete']); !!}
                                {!! Form::submit('Hapus',['class'=>'btn btn-danger']); !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach
                    </tbody>

                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection