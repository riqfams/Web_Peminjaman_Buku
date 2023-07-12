@extends('master')
@section('konten')
<div class="pageTitle">
    <span>Tambah Peminjaman Buku</span>
</div>
    <div class="mt-5 col-5 m-auto">
        <form action="/peminjamanBuku/store" method="post">
            @csrf
            <div class="mb-3">
                <label for="anggota">Nama</label>
                <select name="idAnggota" id="anggota" class="form-control" required>
                    <option value="">Pilih Satu</option>
                    @foreach ($anggota as $a)
                        <option value="{{ $a->id }}">{{ $a->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="buku">Buku</label>
                <select name="idBuku" id="buku" class="form-control" required>
                    <option value="">Pilih Satu</option>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id }}">{{ $b->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tahunTerbit">Tanggal Pinjam</label>
                <input type="date" class="form-control" name="tanggalPinjam" id="tanggalPinjam" required>
            </div>
            <div class="mb-3">
                <label for="tanggalKembali">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tanggalKembali" id="tanggalKembali" required>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection