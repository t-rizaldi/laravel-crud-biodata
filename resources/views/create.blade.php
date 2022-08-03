@extends('layouts.app')

@section('content')
    <section class="create">
        <div class="container">
            <div class="card col-8 mx-auto">
                <div class="card-header">
                    Tambah Data
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="nama" id="nama" class="form-input @error('nama') is-invalid @enderror" placeholder="Nama Lengkap *" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir *" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-input @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin') }}" required>
                                    <option value="">Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <input type="file" name="foto" id="foto" class="form-input @error('foto') is-invalid @enderror">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-input @error('alamat') is-invalid @enderror" placeholder="Alamat *" required>{{old('alamat')}}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text" name="provinsi" id="provinsi" class="form-input @error('provinsi') is-invalid @enderror" placeholder="Provinsi *" value="{{ old('provinsi') }}" required>
                                @error('provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <button type="submit" class="btn btn-primary float-end mt-3">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection