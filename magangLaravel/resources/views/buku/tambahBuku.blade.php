@extends('master')
@section('konten')
    Tambah Buku
    <x-alert message="ini tambah buku" type="success"/>
     
    <div class="mt-5 col-8 m-auto">
        <form action="/buku/store" method="post">
            @csrf
            <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" required>
            </div>
            <div class="mb-3">
                <label for="penulis">Penulis</label>
                <input type="text" class="form-control" name="penulis" id="penulis" required>
            </div>
            <div class="mb-3">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" required>
            </div>
            <div class="mb-3">
                <label for="tahunTerbit">Tahun Terbit</label>
                <input type="number" class="form-control" name="tahunTerbit" id="tahunTerbit" required>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection