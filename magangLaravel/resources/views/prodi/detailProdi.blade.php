@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span> Prodi {{ $prodi->name }}</span>
    </div>
    <div class="row">
        <div class="tableContainer">
            <table class="table-div">
                <tr>
                    <th>ID Prodi</th>
                    <td>{{ $prodi->id }}</td>
                </tr>
                <tr>
                    <th>Anggota</th>
                    <td>
                        @foreach ($prodi->anggota as $anggota)
                            {{$anggota['nama']}} <br>
                        @endforeach
                    </td>                
                </tr>
            </table>

            <a class="btnEdit" href="/buku/edit/{{$prodi->id}}">
                <i class="bi bi-pencil-square">edit</i>
            </a>
            <a class="btnRemove" href="/buku/hapus/{{$prodi->id}}"> 
                <i class="bi bi-trash">delete</i>
            </a>
            
        </div>
    </div>
</div>

@endsection