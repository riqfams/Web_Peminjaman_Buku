@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>Data {{ $anggota->nama }}</span>
    </div>
    <div class="row">
        <div class="table-detail">
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

            <a class="btnEdit" href="/buku/edit/{{$anggota->id}}">
                <i class="bi bi-pencil-square">edit</i>
            </a>
            <a class="btnRemove" href="/buku/hapus/{{$anggota->id}}"> 
                <i class="bi bi-trash">delete</i>
            </a>
            
        </div>
    </div>
</div>

@endsection