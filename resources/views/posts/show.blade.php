@extends('layouts.app')

@section('content')
    <div class="card">
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endcan
        </div>
    </div>

    <hr>

    <h5>Comments</h5>
    @foreach($post->comments as $comment)
        <div class="comment">
            <p>{{ $comment->comment }}</p>
            @can('update', $comment)
                <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning btn-sm">Edit</a>
            @endcan
            @can('delete', $comment)
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            @endcan
        </div>
    @endforeach

    @auth
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="comment">Add a Comment</label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endauth
@endsection
