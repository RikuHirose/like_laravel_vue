@extends('layouts.app')

@section('content')

<form action="{{ route('post.store') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="">Example textarea</label>
    <textarea class="form-control" id="" rows="3" name="content"></textarea>

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
