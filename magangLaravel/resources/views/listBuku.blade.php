@extends('master')
@section('konten')

<div class="pageSection">
    <x-alert message="ini list buku" type="primary"/>
    <div class="pageTitle">
        <span>List Buku</span>
    </div>
    <div class="row">
        <a class="btnAdd" href="/buku/tambah" role="button"> 
            <i class="bi bi-plus-lg"></i>
            <span class="btnLabel">Tambah data</span>
        </a>
        <div class="tableContainer">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>ID Buku</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah</th>
                        <th>Denda</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $b)
                        <tr>
                            <td>{{ $b->idBuku }}</td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->penulis }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>{{ $b->tahunTerbit }}</td>
                            <td>{{ $b->jumlah }}</td>
                            <td>{{ $b->denda }}</td>
                            <td>
                                <a class="btnEdit" href="/buku/edit/{{$b->idBuku}}">
                                    <i class="bi bi-pencil-square">edit</i>
                                </a>
                                <a class="btnRemove" href="/buku/hapus/{{$b->idBuku}}"> 
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