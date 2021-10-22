@extends('layout')

@section('content')
  @forelse ($posts as $post)
    <p>
    <h3>
      <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
    </h3>

    @if ($post->comments_count)
      <p>{{ $post->comments_count }} comments</p>
    @else
     <p> No comments yet!</p>
    @endif

    <div class="d-flex">
      <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">
        Edit
      </a>

      <form method="POST" class="ml-2" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
        @csrf
        @method('DELETE')

        <input type="submit" value="Delete!" class="btn btn-primary" />
      </form>
    </div>
    </p>
  @empty
    <p>No blog posts yet!</p>
  @endforelse
@endsection('content')
