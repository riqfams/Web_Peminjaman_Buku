@extends('master')
@section('konten')

<div class="pageSection">
    <div class="pageTitle">
        <span>{{ $post->title }}</span>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center text-center ">
        <h5 class="mt-3">
            Tags:
            @foreach ($post->tags as $tag)
                {{ $tag->name }},
            @endforeach
        </h5>
        <div>Image: {{ $post->image? $post->image->filename: "" }}</div>
        <p class="mt-3"> Body: 
            {{ $post->post_body }}
        </p>
        <h5 class="mt-3">Comment Section</h5>
        <ul>
            @foreach ($post->comments as $comment)
                <li>{{ $comment->comment_body }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection