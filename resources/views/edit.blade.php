@extends('layouts.app')

@section('content')
    <section class="create">
        <div class="container">
            <div class="card col-8 mx-auto">
                <div class="card-header">
                    Edit Data
                </div>
                <div class="card-body">
                    <form action="{{ route('update', $people->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="nama" id="nama" class="form-input @error('nama') is-invalid @enderror" placeholder="Nama Lengkap *" value="{{ old('nama', $people->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir *" value="{{ old('tanggal_lahir', $people->tanggal_lahir) }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-input @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin') }}" required>
                                    <option value="">Jenis Kelamin</option>
                                    <option value="L" @selected(old('jenis_kelamin',$people->jenis_kelamin) == 'L')>Laki-Laki</option>
                                    <option value="P" @selected(old('jenis_kelamin',$people->jenis_kelamin) == 'P')>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <input type="file" name="foto" id="foto" class="form-input @error('foto') is-invalid @enderror">
                                <input type="hidden" name="fotoLama" id="fotoLama" class="form-input @error('foto') is-invalid @enderror" value="{{$people->foto}}">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-input @error('alamat') is-invalid @enderror" placeholder="Alamat *" required>{{ old('alamat',$people->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text" name="provinsi" id="provinsi" class="form-input @error('provinsi') is-invalid @enderror" placeholder="Provinsi *" value="{{ old('provinsi',$people->alamat) }}" required>
                                @error('provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <button type="submit" class="btn btn-primary float-end mt-3">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection