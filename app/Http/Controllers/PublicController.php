<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('index', [
            'data' => Mahasiswa::all()
        ]);
    }

    public function edit($id)
    {
        $data = DB::table('mahasiswas')->where('id', $id)->get();

        return view('edit', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $nama = $request -> input('nama');
        $gender = $request -> input('gender');
        $alamat = $request -> input('alamat');
        $jurusan = $request -> input('jurusan');

        $data = array('nama' => $nama, 'gender' => $gender, 'alamat' => $alamat, 'jurusan' => $jurusan);

        DB::table('mahasiswas')->insert($data);

        return redirect('/')->with('success', 'Berhasil menambahkan data');
    }

    public function delete($identity)
    {
        DB::table('mahasiswas')->where('id', $identity)->delete();

        return redirect('/')->with('success', 'Deleted');
    }

    public function update(Request $request)
    {
        $name = $request->input('nama');
        $alamat = $request->input('alamat');
        $gender = $request->input('gender');
        $jurusan = $request->input('jurusan');
        $id = $request->input('id');

        DB::table('mahasiswas')->where('id', $id)->update([
            'nama' => $name,
            'alamat' => $alamat,
            'gender' => $gender,
            'jurusan' => $jurusan
        ]);

        return redirect('/')->with('success', 'Updated');
    }
}
