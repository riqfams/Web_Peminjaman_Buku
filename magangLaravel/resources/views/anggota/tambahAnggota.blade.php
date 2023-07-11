@extends('master')
@section('konten')
    Tambah Anggota
    <x-alert message="ini tambah anggota" type="success"/>
     
    <div class="mt-5 col-8 m-auto">
        <form action="/anggota/store" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="mb-3">
                <label for="kelamin">Kelamin</label>
                <select name="kelamin" id="kelamin" class="form-control" required>
                    <option value="">Pilih Satu</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" name="nim" id="nim" required>
            </div>
            <div class="mb-3">
                <label for="prodi">Prodi</label>
                <select name="prodi_id" id="prodi" class="form-control" required>
                    <option value="">Pilih Satu</option>
                    @foreach ($prodi as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" required>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection