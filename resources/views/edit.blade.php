@extends('layouts.main')

@section('body')
    <div class="container mt-5">
        @foreach ($data as $item)
            <form action="/update" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="nama" name="nama" value="{{ $item->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                        <select name="gender" id="">
                            @if ($item->gender == 'Male')
                                <option value="Male">Male</option>
                            @else
                                <option value="Female">Female</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jurusan</label>
                        <select name="jurusan" id="">
                            @if ($item->gender == 'Information Technology')
                                <option value="Information Technology">Information Technology</option>
                            @else
                                <option value="Information System">Information System</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input type="alamat" name="alamat" value="{{ $item->alamat }}">
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
    </div>
    @endforeach
    </form>
    </div>
@endsection
