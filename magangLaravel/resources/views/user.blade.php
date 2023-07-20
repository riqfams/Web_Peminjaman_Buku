@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>List User</span>
    </div>
    <div>
        <div class="tableContainer col-8 m-auto">
            <table class="table-div">
                <thead class="thead-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Profile Picture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $u->name }}</td>                       
                            <td>{{ $u->role['name'] }}</td>                       
                            <td>{{ $u->email }}</td>                       
                            <td>{{ $u->image? $u->image->filename: "" }}</td>                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection