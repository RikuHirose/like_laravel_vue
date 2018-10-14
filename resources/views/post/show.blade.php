@extends('layouts.app')

@section('content')

  <div class="card">
  <div class="card-body">
    {{ $post->content }}
  </div>
  <like
    :post-id="{{ json_encode($post->id) }}"
    :default-likes="{{ json_encode($liked) }}"
    :default-like-count="{{ json_encode($likeCount) }}">
  </like>

</div>

@endsection
