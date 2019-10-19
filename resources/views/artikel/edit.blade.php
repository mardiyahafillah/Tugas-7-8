@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Artikel</div>

                <div class="card-body">
              	
                {!! Form::model($Artikel,['route' => ['artikel.update', $Artikel->id],'method' => 'patch']); !!}
              		@include('artikel.form')
              	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
    <script>
      $(document).ready(function() {
        CKEDITOR.replace('isi');
        
      });
    </script>
@endsection