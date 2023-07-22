@extends('master')
@section('konten')

<div class="pageSection">
    @if (Session::has('status'))
        <x-alert message="{{ Session::get('message') }}" type="success"/>
    @endif

    <div class="pageTitle">
        <span>List Anggota</span>
    </div>
    <div>
        <div class="d-flex justify-content-around mt-3 mb-3">
            <a class="btn btn-primary" href="/anggota/tambah">Tambah Data</a>
            <a class="btn btn-info" href="/anggota/deleted">List Deleted Data</a>
            <a class="btn btn-primary" href="/prodi/list">List Prodi</a>
            <a class="btn btn-info" href="/anggota/export">Download Data</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-4">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="nama anggota">
                        <button class="input-group-text btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="tableContainer m-auto">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
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
                            <td>{{ $a->ktp['nik'] }}</td>
                            <td>{{ $a->nim }}</td>
                            <td>{{ $a->prodi['name'] }}</td>
                            <td>
                                @if (Auth::user()->role_id != 2)
                                    <a class="btn btn-info" href="/anggota/detail/{{$a->slug}}">Detail</a>
                                @else
                                    <a class="btn btn-info" href="/anggota/detail/{{$a->slug}}">Detail</a>
                                    <a class="btn btn-primary" href="/anggota/edit/{{$a->slug}}">Edit</a>
                                    <a class="btn btn-danger" href="/anggota/delete/{{$a->slug}}">Hapus</a>
                                @endif                               
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $anggota->withQueryString()->links() }}
        </div>        
    </div>
</div>
@endsection