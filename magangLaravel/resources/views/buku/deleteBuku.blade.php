@extends('master')
@section('konten')

<div class="mt-5 col-5 m-auto text-center">
    <h4 class="text-center">Apakah anda ingin menghapus data buku {{ $buku->judul }}</h4>
    <form style="display: inline-block" action="/buku/destroy/{{ $buku->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <button class="btn btn-primary">Cancel</button>
</div>


@endsection