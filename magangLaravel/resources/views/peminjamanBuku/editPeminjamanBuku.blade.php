@extends('master')
@section('konten')
    <div class="pageTitle">
        <span>Edit Peminjaman Buku</span>
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
        
        <form action="/peminjamanBuku/update/{{ $peminjamanBuku->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="anggota">Nama</label>
                <select name="idAnggota" id="anggota" class="form-control" required>
                    <option value="{{ $peminjamanBuku->anggota->id }}">{{ $peminjamanBuku->anggota->nama }}</option>
                    @foreach ($anggota as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="buku">Buku</label>
                <select name="idBuku" id="buku" class="form-control" required>
                    <option value="{{ $peminjamanBuku->buku->id }}">{{ $peminjamanBuku->buku->judul }}</option>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id }}">{{ $b->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tahunTerbit">Tanggal Pinjam</label>
                <input type="date" class="form-control" name="tanggalPinjam" id="tanggalPinjam" value="{{ $peminjamanBuku->tanggalPinjam }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggalKembali">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tanggalKembali" id="tanggalKembali" value="{{ $peminjamanBuku->tanggalKembali }}" required>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection