@extends('layouts.app')

@section('content')
    <section class="detail">
        <div class="container">
            <div class="card col-8 mx-auto">
                <div class="card-header">
                    Detail People

                    <a href="{{route('edit', $people->id)}}" class="btn btn-warning btn-sm ms-3"><i class="fas fa-pencil-alt"></i></a>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-lg-4">
                            @if (!empty($people->foto))
                                <img src="{{ asset('storage/' . $people->foto) }}" alt="" class="img-fluid">                                
                            @else
                                <img src="{{ asset('storage/img-people/default.png') }}" alt="" class="img-fluid">                              
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <table class="table">
                                <tr>
                                    <th>NAMA</th>
                                    <th>:</th>
                                    <td>{{ $people->nama }}</td>
                                </tr>
                                <tr>
                                    <th>JENIS KELAMIN</th>
                                    <th>:</th>
                                    <td>{{ $people->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</th>
                                </tr>
                                <tr>
                                    <th>TANGGAL LAHIR</th>
                                    <th>:</th>
                                    <td>{{ $people->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>ALAMAT</th>
                                    <th>:</th>
                                    <td>{{ $people->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>PROVINSI</th>
                                    <th>:</th>
                                    <td>{{ $people->provinsi }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection