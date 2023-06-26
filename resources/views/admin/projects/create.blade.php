@extends('layouts.app')

@section('content')

<div class="container p-5 ">

  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <h2 class="my-4 fs-4 text-secondary fw-bold">
    Nuovo Progetto
  </h2>

  <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="my-5 mb-3">
      <label for="title" class="form-label fw-bold">Titolo</label>
      <input
      type="title"
      class="form-control @error('title') is-invalid @enderror"
      id="title"
      name="title"
      value="{{old('title')}}"
      aria-describedby="title"
      placeholder="titolo">
      @error('title')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="text" class="form-label fw-bold">Testo</label>
      <textarea
      name="text"
      id="text"
      cols="145"
      rows="10"
      placeholder="testo...">
      {{old('text')}}
      @error('text')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </textarea>
    </div>

    <div class="my-5 mb-3">
      <label for="file" class="form-label fw-bold">Immagine</label>
      <input
      type="file"
      class="form-control @error('file') is-invalid @enderror"
      id="image"
      name="image">
    </div>


    <button type="submit" class="btn btn-primary">Invia</button>
  </form>

</div>


<script>
  ClassicEditor
      .create( document.querySelector( '#text' ) )
      .catch( error => {
          console.error( error );
      } );
</script>

@endsection