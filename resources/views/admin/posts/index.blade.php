@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Tutti i post</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post) 
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection