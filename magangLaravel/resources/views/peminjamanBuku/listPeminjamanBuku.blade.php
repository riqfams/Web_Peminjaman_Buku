@extends('master')
@section('konten')

<div class="pageSection">
    <x-alert message="ini list peminjaman buku" type="success"/>
    <div class="pageTitle">
        <span>List Peminjaman Buku</span>
    </div>
    <div class="row">
        <a class="btnAdd" href="/peminjamanBuku/tambah" role="button"> 
            <i class="bi bi-plus-lg"></i>
            <span class="btnLabel">Tambah data</span>
        </a>
        <div class="tableContainer">
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
                                <a class="btnEdit" href="/peminjamanBuku/edit/{{$pb->id}}">
                                    <i class="bi bi-pencil-square">edit</i>
                                </a>
                                <a class="btnRemove" href="/peminjamanBuku/hapus/{{$pb->id}}"> 
                                    <i class="bi bi-trash">apus</i>
                                </a>
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection