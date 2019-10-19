@csrf

                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('judul', null ,['class' => 'form-control']); !!}

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori_artikel_id" class="col-md-4 col-form-label text-md-right">{{ __('Kategori Artikel Id') }}</label>

                            <div class="col-md-6">
                                {!! Form::select('kategori_artikel_id',$KategoriArtikel, null, ['class' => 'form-control']); !!}
                                @error('kategori_artikel
                                _id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="isi" class="col-md-4 col-form-label text-md-right">{{ __('Isi') }}</label>

                            <div class="col-md-6">
                                {!! Form::textarea('isi', null ,['class' => 'form-control']); !!}

                                @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="users_id" type="hidden" class="form-control @error('users_id') is-invalid @enderror" name="users_id" value="{{ Auth::id() }}" required autocomplete="users_id">

                                @error('users_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{!! route('artikel.index') !!}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>