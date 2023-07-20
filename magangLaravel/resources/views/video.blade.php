@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>List Video</span>
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
                    @foreach ($videos as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->title }}</td>                       
                            <td><a href="/video-detail/{{ $v->id }}">Detail</a></td>                                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection