@extends('master')
@section('konten')

<div class="pageSection">
    @if (Session::has('status'))
        <x-alert message="{{ Session::get('message') }}" type="success"/>
    @endif
    <h4 class="text-center">Selamat datang, {{ Auth::user()->name }}, Anda masuk sebagai {{ Auth::user()->role->name }}</h4>
    <div class="pageTitle">
        <span>List Buku</span>
    </div>
    <div>
        <div class="d-flex justify-content-around mt-3 mb-3">
            <a class="btn btn-primary" href="/buku/tambah" role="button">Tambah Data</a>
            <div class="col-md-3">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" placeholder="nama">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <a class="btn btn-info" href="/buku/deleted" role="button">List Deleted Data</a>
        </div>
        <div class="tableContainer m-auto">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Cover</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->judul }}</td>
                            <td><img src="{{ asset('storage/'.$b->image) }}" width="50px"></td>
                            <td>{{ $b->penulis }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>{{ $b->tahunTerbit }}</td>
                            <td>
                                @if (Auth::user()->role_id != 2)
                                    <a class="btn btn-info" href="/buku/detail/{{$b->slug}}">Detail</a>
                                @else
                                    <a class="btn btn-info" href="/buku/detail/{{$b->slug}}">Detail</a>
                                    <a class="btn btn-primary" href="/buku/edit/{{$b->slug}}">Edit</a>
                                    <a class="btn btn-danger" href="/buku/delete/{{$b->slug}}">Delete</a>
                                @endif
                            </td>   
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $buku->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection