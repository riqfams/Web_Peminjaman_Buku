@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>{{ $video->title }}</span>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center text-center ">
        <p class="mt-3">
            Tags:
            @foreach ($video->tags as $tag)
                {{ $tag->name }},
            @endforeach
        </p>
        <h5 class="mt-3">Comment Section</h5>
        <ul>
            @foreach ($video->comments as $comment)
                <li>{{ $comment->comment_body }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection