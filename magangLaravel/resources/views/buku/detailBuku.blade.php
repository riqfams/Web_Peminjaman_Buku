@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>{{ $buku->judul }}</span>
    </div>
    <div class="row">
        <div class="table-detail col-5 m-auto">
            <table class="table-div">
                <tr>
                    <th>ID Buku</th>
                    <td>{{ $buku->id }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $buku->penulis }}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>{{ $buku->penerbit }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku->tahunTerbit }}</td>
                </tr>
            </table>

            <a class="btn btn-primary" href="/buku/edit/{{$buku->id}}">Edit</a>
            <a class="btn btn-danger" href="/buku/hapus/{{$buku->id}}">Delete</a>
            
        </div>
    </div>
</div>

@endsection