@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>{{ $video->title }}</span>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center text-center ">
        <h5 class="mt-5">Comment Section</h5>
        <ul>
            @foreach ($video->comments as $comment)
                <li>{{ $comment->comment_body }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection