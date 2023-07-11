@extends('master')
@section('konten')

<div class="pageSection">
    <x-alert message="ini list anggota" type="success"/>
    <div class="pageTitle">
        <span>List Anggota</span>
    </div>
    <div class="row">
        <a class="btnAdd" href="/anggota/tambah" role="button"> 
            <i class="bi bi-plus-lg"></i>
            <span class="btnLabel">Tambah data</span>
        </a>
        <a class="btnProdi" href="/prodi/list" role="button"> 
            <i class="bi bi-plus-lg"></i>
            <span class="btnLabel">List Prodi</span>
        </a>
        <div class="tableContainer">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $a)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->nama }}</td>
                            <td>{{ $a->nim }}</td>
                            <td>{{ $a->prodi['name'] }}</td>
                            <td>
                                <a class="btnDetail" href="/anggota/detail/{{$a->id}}">
                                    <i class="bi bi-pencil-square">detail</i>
                                </a>
                                <a class="btnEdit" href="/buku/edit/{{$a->id}}">
                                    <i class="bi bi-pencil-square">edit</i>
                                </a>
                                <a class="btnRemove" href="/buku/hapus/{{$a->id}}"> 
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