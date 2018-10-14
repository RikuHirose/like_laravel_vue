@extends('layouts.app')

@section('content')


  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">content</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
          <th scope="row">
            <a href="{{ route('post.show', $post->id) }}">{{ $post->id }}</a>
          </th>
          <td>{{ $post->content }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
