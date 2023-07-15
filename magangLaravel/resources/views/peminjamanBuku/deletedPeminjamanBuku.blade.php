@extends('master')
@section('konten')

<div class="pageSection">

    <div class="pageTitle">
        <span>List Peminjaman Buku</span>
    </div>
    <div>
        <div class="tableContainer m-auto">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjamanBuku as $pb)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pb->anggota['nama'] }}</td>
                            <td>{{ $pb->buku['judul'] }}</td>
                            <td>{{ $pb->tanggalPinjam }}</td>
                            <td>{{ $pb->tanggalKembali }}</td>
                            <td>
                                <a class="btn btn-warning" href="/peminjamanBuku/{{$pb->id}}/restore">Restore</a>
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection