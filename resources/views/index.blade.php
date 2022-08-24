@extends('layouts.main')

@section('body')
    <div class="container mt-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>

        <div class="col-mt-3 md-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data Mahasiswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/adddata" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="nama" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jurusan</label>
                                    <select name="jurusan" id="">
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Information System">Information System</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                    <input type="alamat" name="alamat">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div class="list">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="d-flex justify-content-evenly">
                                    <a href="/edit/{{ $item->id }}" class="badge bg-success"><span data-feather="edit"></span></a>
                                    <form action="/delete/{{ $item->id }}" method="POST">
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Delete data?')"><span data-feather="trash-2"></span></button>
                                    </form>
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
