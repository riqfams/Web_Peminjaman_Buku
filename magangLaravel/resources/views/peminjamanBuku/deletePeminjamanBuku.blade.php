@extends('master')
@section('konten')

<div class="mt-5 col-5 m-auto text-center">
    <h4 class="text-center">Apakah anda sudah selesai meminjam buku {{ $peminjamanBuku->buku->judul }}</h4>
    <form style="display: inline-block" action="/peminjamanBuku/destroy/{{ $peminjamanBuku->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Selesai</button>
    </form>
    <button class="btn btn-primary"><a class="text-light" href="/peminjamanBuku/list">Cancel</a></button>
</div>


@endsection