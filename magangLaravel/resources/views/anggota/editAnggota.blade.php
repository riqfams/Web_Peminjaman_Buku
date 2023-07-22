@extends('master')
@section('konten')

<div class="pageTitle">
    <span>Edit Anggota</span>
</div>
<div class="mt-5 col-5 m-auto">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="/anggota/update/{{ $anggota->slug }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $anggota->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="kelamin">Kelamin</label>
            <select name="kelamin" id="kelamin" class="form-control" required>
                <option value="{{ $anggota->kelamin }}">{{ $anggota->kelamin }}</option>
                @if ($anggota->kelamin == 'L')
                    <option value="P">P</option>
                @else
                    <option value="L">L</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="nik">NIK</label>
            <input type="number" class="form-control" name="nik" id="nik" value="{{ $anggota->ktp->nik }}" required>
        </div> 
        <div class="mb-3">
            <label for="nim">NIM</label>
            <input type="number" class="form-control" name="nim" id="nim" value="{{ $anggota->nim }}" required>
        </div> 
        <div class="mb-3">
            <label for="prodi">Prodi</label>
            <select name="prodi_id" id="prodi" class="form-control" required>
                @foreach ($prodi as $p)
                    <option value="{{ $p->id }}" @if($p->id == $anggota->prodi->id) selected @endif>
                        {{ $p->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $anggota->alamat }}" required>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection