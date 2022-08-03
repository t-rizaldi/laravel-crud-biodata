@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-title text-uppercase">
                        <h1>CRUD Biodata</h1>
                    </div>
                    <div class="cta">
                        <a href="#data" class="btn btn-primary btn-started">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="{{ asset('img/hero-image.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- End Hero Section --}}

{{-- Data Section --}}
    <section class="data" id="data">
        <div class="container">
            <div class="section-title text-center">
                <h2>List Data</h2>
            </div>
            <div class="card list-data">
                <div class="card-header">
                    Peoples Data
                    <a href="{{ route('create') }}" class="btn btn-primary btn-sm float-end"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body table-responsive">

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr align="middle">
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $peoples as $people)
                                <tr>
                                    <td align="middle">{{ $loop->iteration }}</td>
                                    <td>{{ $people->nama }}</td>
                                    <td align="middle">{{ $people->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                    <td>{{ $people->tanggal_lahir }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('detail', $people->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('edit', $people->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                        <form action="{{ route('delete',  $people->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></i></button>
                                        </form>
                                    </td>
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection