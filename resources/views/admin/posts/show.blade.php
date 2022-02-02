@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2">
        <h2 class="text-center">
          {{ $post->title}}
        </h2>
        <p>
          {{ $post->content }}
        </p>
      </div>

    </div>
    <button class="btn btn-primary bg-white">
      <a href="{{ route('admin.posts.index') }}"> Indietro </a>
    </button>

  </div>
@endsection