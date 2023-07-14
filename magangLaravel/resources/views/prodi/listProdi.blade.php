@extends('master')
@section('konten')

<div class="pageSection">
    @if (Session::has('status'))
        <x-alert message="{{ Session::get('message') }}" type="success"/>
    @endif

    <div class="pageTitle">
        <span>List Prodi</span>
    </div>
    <div>
        <div class="d-flex justify-content-around mb-3">
            <a class="btn btn-primary" href="/prodi/tambah" role="button">Tambah Data</a>
            <a class="btn btn-primary invisible" href="/prodi/tambah" role="button" >Tambah Data</a>
        </div>
        <div class="tableContainer col-8 m-auto">
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
                                <a class="btn btn-info" href="/prodi/detail/{{$p->id}}">Detail</a>
                                <a class="btn btn-primary" href="/prodi/edit/{{$p->id}}">Edit</a>
                                <a class="btn btn-danger" href="/prodi/delete/{{$p->id}}">Delete</a>
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection