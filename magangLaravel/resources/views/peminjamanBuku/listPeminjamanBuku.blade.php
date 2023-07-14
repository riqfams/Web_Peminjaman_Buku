@extends('master')
@section('konten')

<div class="pageSection">
    <x-alert message="ini list peminjaman buku" type="success"/>
    <div class="pageTitle">
        <span>List Peminjaman Buku</span>
    </div>
    <div>
        <div class="d-flex justify-content-around mb-3">
            <a class="btn btn-primary" href="/peminjamanBuku/tambah" role="button">Tambah Data</a>
            <a class="btn btn-primary invisible" href="/peminjamanBuku/tambah" role="button">Tambah Data</a>
            <a class="btn btn-primary invisible" href="/peminjamanBuku/tambah" role="button">Tambah Data</a>
        </div>
        <div class="tableContainer m-auto">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama Anggota</th>
                        <th>Prodi</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjamanBuku as $pb)
                        <tr>
                            <td>{{ $pb->id }}</td>
                            <td>{{ $pb->anggota['nama'] }}</td>
                            <td>{{ $pb->anggota->prodi->name }}</td>
                            <td>{{ $pb->buku['judul'] }}</td>
                            <td>{{ $pb->tanggalPinjam }}</td>
                            <td>{{ $pb->tanggalKembali }}</td>
                            <td>
                                <a class="btn btn-primary" href="/peminjamanBuku/edit/{{$pb->id}}">Edit</a>
                                <a class="btn btn-danger" href="/peminjamanBuku/hapus/{{$pb->id}}">Delete</a>
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection