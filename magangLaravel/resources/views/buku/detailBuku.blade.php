@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>{{ $buku->judul }}</span>
    </div>
    <div>
        <div class="mb-3 d-flex justify-content-center">
            <img src="{{ asset('storage/'.$buku->image) }}" alt="gambar buku" width="200px">
        </div>
        <div class="table-detail col-5 m-auto">
            <table class="table-div">
                <tr>
                    <th>ID Buku</th>
                    <td>{{ $buku->id }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $buku->penulis }}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>{{ $buku->penerbit }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku->tahunTerbit }}</td>
                </tr>
            </table>

            @if (Auth::user()->role_id != 2)
            @else
                <a class="btn btn-primary" href="/buku/edit/{{$buku->slug}}">Edit</a>
                <a class="btn btn-danger" href="/buku/delete/{{$buku->slug}}">Delete</a>      
            @endif

        </div>
    </div>
</div>

@endsection