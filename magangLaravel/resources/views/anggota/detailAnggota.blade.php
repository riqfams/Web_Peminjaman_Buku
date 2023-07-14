@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>Data {{ $anggota->nama }}</span>
    </div>
    <div class="row">
        <div class="table-detail col-5 m-auto">
            <table class="table-div">
                <tr>
                    <th>ID</th>
                    <td>{{ $anggota->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $anggota->nama }}</td>
                </tr>
                <tr>
                    <th>Kelamin</th>
                    <td>{{ $anggota->kelamin }}</td>
                </tr>
                <tr>
                    <th>NIM</th>
                    <td>{{ $anggota->nim }}</td>
                </tr>
                <tr>
                    <th>Prodi</th>
                    <td>{{ $anggota->prodi['name'] }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $anggota->alamat }}</td>
                </tr>
            </table>

            <a class="btn btn-primary" href="/anggota/edit/{{$anggota->id}}">Edit</a>
            <a class="btn btn-danger" href="/anggota/hapus/{{$anggota->id}}">Delete</a>
            
        </div>
    </div>
</div>

@endsection