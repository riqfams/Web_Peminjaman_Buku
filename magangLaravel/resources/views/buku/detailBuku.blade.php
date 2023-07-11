@extends('master')
@section('konten')

<div class="pageSection">
    <x-alert message="ini list buku" type="primary"/>
    <div class="pageTitle">
        <span>{{ $buku->judul }}</span>
    </div>
    <div class="row">
        <div class="tableContainer">
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

            <a class="btnEdit" href="/buku/edit/{{$buku->id}}">
                <i class="bi bi-pencil-square">edit</i>
            </a>
            <a class="btnRemove" href="/buku/hapus/{{$buku->id}}"> 
                <i class="bi bi-trash">delete</i>
            </a>
            
        </div>
    </div>
</div>

@endsection