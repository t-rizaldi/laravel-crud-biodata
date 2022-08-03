<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Ihsan CRUD',
            'peoples'   => People::all()
        ];

        return view('home', $data);
    }

    public function detail(People $people)
    {
        $data = [
            'title'     => 'Ihsan CRUD | Detail Data',
            'people'    => $people
        ];

        return view('detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Ihsan CRUD | Tambah Data'
        ];

        return view('create', $data);
    }

    public function store(Request $request)
    {
        $message = [
            'required'      => ':attribute tidak boleh kosong!',
            'image'         => 'yang anda upload harus gambar!'
        ];

        $validatedData = $request->validate([
            'nama'          => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'provinsi'      => 'required',
            'foto'          => 'image'
        ], $message);

        if (!empty($request->file('foto'))) {
            $foto = $request->file('foto')->store('img-people');

            $validatedData['foto'] = $foto;
        }

        People::create($validatedData);
        return to_route('home')->with('success', 'Data berhasil ditambah!');
    }


    public function edit(People $people)
    {
        $data = [
            'title'     => 'Ihsan CRUD | Edit Data',
            'people'    => $people
        ];

        return view('edit', $data);
    }


    public function update(Request $request, People $people)
    {

        $message = [
            'required'      => ':attribute tidak boleh kosong!',
            'image'         => 'yang anda upload harus gambar!'
        ];

        $validatedData = $request->validate([
            'nama'          => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'provinsi'      => 'required',
            'foto'          => 'image'
        ], $message);

        if (!empty($request->file('foto'))) {
            $foto = $request->file('foto')->store('img-people');

            if(!empty($people->foto)) {
                Storage::delete($people->foto);
            }

            $validatedData['foto'] = $foto;
        } else {
            $validatedData['foto'] = $request->fotoLama;
        }

        People::where('id', $people->id)->update($validatedData);
        return to_route('home')->with('success', 'Data berhasil diubah!');
    }

    public function delete(People $people)
    {
        if(!empty($people->foto)){
            Storage::delete($people->foto);
        }

        $people->delete($people->id);
        return to_route('home')->with('success', 'Data berhasil di hapus!');
    }
}
