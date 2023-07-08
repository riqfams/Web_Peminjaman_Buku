@extends('master')
@section('konten')

<div class="pageSection">
    <x-alert message="ini list prodi" type="warning"/>
    <div class="pageTitle">
        <span>List Prodi</span>
    </div>
    <div class="row">
        <a class="btnAdd" href="/prodi/tambah" role="button"> 
            <i class="bi bi-plus-lg"></i>
            <span class="btnLabel">Tambah data</span>
        </a>
        <div class="tableContainer">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodi as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td>
                                <a class="btnEdit" href="/buku/edit/{{$p->id}}">
                                    <i class="bi bi-pencil-square">edit</i>
                                </a>
                                <a class="btnRemove" href="/buku/hapus/{{$p->id}}"> 
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