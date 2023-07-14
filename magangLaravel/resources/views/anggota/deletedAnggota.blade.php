@extends('master')
@section('konten')

<div class="pageSection">

    <div class="pageTitle">
        <span>List Deleted Anggota </span>
    </div>
    <div class="row">
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
                                <a class="btn btn-warning" href="/anggota/{{$a->id}}/restore">Restore</a>                  
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection