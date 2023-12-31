@extends('master')
@section('konten')

<div class="mt-5 col-5 m-auto text-center">
    <h4 class="text-center">Apakah anda ingin menghapus data anggota {{ $anggota->nama }}</h4>
    <form style="display: inline-block" action="/anggota/destroy/{{ $anggota->slug }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <button class="btn btn-primary"><a href="/anggota/list" class="text-light">Cancel</a></button>
</div>


@endsection