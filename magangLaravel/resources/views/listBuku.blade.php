@extends('master')
@section('konten')
    <x-alert message="ini list buku" type="primary"/>
    <h2>List Buku</h2>
    <table>
        <tr>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah</th>
            <th>Denda</th>
        </tr>
        @foreach ($buku as $b)
            <tr>
                <td>{{ $b->idBuku }}</td>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->tahunTerbit }}</td>
                <td>{{ $b->jumlah }}</td>
                <td>{{ $b->denda }}</td>
            </tr>
        @endforeach
    </table>
@endsection