@extends('master')
@section('konten')
    <div class="pageTitle">
        <span>Tambah Buku</span>
    </div>
    <div class="mt-5 col-5 m-auto">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="/buku/store" method="post" enctype="multipart/form-data">
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
            <div class="mb-3">
                <label for="image">Gambar Buku</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>      
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            
        </form>
    </div>
@endsection