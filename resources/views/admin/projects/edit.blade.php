@extends('layouts.app')

@section('content')
<div class="container my-4">

  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <h1 class="fw-bold text-secondary">Modifica Progetto</h1>

  <form action="{{route('admin.projects.update', $project)}}" method="POST">
    @method('PUT')

    <div class="my-5 mb-3">
      @csrf
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

    <button type="submit" class="btn btn-primary">Invia</button>
  </form>


</div>


<script>
  classiceditor
      .create( document.queryselector( '#text' ) )
      .catch( error => {
          console.error( error );
      } );
</script>


@endsection