@extends('master')
@section('konten')

<div class="pageSection">
    <x-alert message="ini list anggota" type="success"/>
    <div class="pageTitle">
        <span>List Anggota</span>
    </div>
    <div class="row">
        <a class="btnAdd" href="/buku/tambah" role="button"> 
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
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelamin</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->nama }}</td>
                            <td>{{ $a->kelamin }}</td>
                            <td>{{ $a->nim }}</td>
                            <td>{{ $a->prodi['name'] }}</td>
                            <td>{{ $a->alamat }}</td>
                            <td>
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