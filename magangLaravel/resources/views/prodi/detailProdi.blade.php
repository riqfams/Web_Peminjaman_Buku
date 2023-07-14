@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span> Prodi {{ $prodi->name }}</span>
    </div>
    <div class="row">
        <div class="table-detail col-5 m-auto">
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

            <a class="btn btn-primary" href="/prodi/edit/{{$prodi->id}}">Edit</a>
            <a class="btn btn-danger" href="/prodi/hapus/{{$prodi->id}}">Delete</a>
            
        </div>
    </div>
</div>

@endsection