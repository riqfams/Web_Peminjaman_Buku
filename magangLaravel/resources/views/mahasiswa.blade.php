@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>List Mahasiswa (dari Database yang Berbeda)</span>
    </div>
    <div>
        <div class="tableContainer col-8 m-auto">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Kelamin</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $m)
                        <tr>
                            <td>{{ $m->id }}</td>
                            <td>{{ $m->nama }}</td>                       
                            <td>{{ $m->nim }}</td>                       
                            <td>{{ $m->jk }}</td>                       
                            <td>{{ $m->alamat }}</td>                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection