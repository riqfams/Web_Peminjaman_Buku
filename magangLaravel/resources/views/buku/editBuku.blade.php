@extends('master')
@section('konten')
    <div class="pageTitle">
        <span>Edit Buku</span>
    </div>
    <div class="mt-5 col-5 m-auto">
        <form action="/buku/update/{{ $buku->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $buku->judul }}" required>
            </div>
            <div class="mb-3">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control" name="penulis" id="penulis" value="{{ $buku->penulis }}" required>
            </div>
            <div class="mb-3">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" value="{{ $buku->penerbit }}" required>
            </div>
            <div class="mb-3">
                <label for="tahunTerbit">Tahun Terbit</label>
                <input type="number" class="form-control" name="tahunTerbit" id="tahunTerbit" value="{{ $buku->tahunTerbit }}" required>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection