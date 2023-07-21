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
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->title }}</td>
                            <td><a href="/post-detail/{{ $p->id }}">Detail</a></td>                                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection