@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>
      Crea il tuo post
    </h2>
    
    <form action="{{ route("admin.posts.store") }}" method="POST">
      @csrf
      
      <div class="mb-3">
        <label for="title" class="form-label">Titolo del post</label>
        <input type="text" class="form-control" 
        name="title"
        id="title" placeholder="Inserisci il titolo del post">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Scrivi qui quello che vuoi</label>
        <textarea class="form-control" 
        name="content"
        id="exampleFormControlTextarea1" rows="3">
         
        </textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-3">
        Invia
      </button>
      <button type="submit" class="btn btn-secondary mt-3">
        Cancella
      </button>
    </form>
  </div>
@endsection