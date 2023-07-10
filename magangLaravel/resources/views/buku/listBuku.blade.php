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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $b)
                        <tr>
                            <td>{{ $b->id }}</td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->penulis }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>{{ $b->tahunTerbit }}</td>
                            <td>
                                <a class="btnDetail" href="/buku/detail/{{$b->id}}">
                                    <i class="bi bi-pencil-square">detail</i>
                                </a>
                                <a class="btnEdit" href="/buku/edit/{{$b->id}}">
                                    <i class="bi bi-pencil-square">edit</i>
                                </a>
                                <a class="btnRemove" href="/buku/hapus/{{$b->id}}"> 
                                    <i class="bi bi-trash">delete</i>
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