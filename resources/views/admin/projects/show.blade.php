@extends('layouts.app')

@section('content')
<div class="container p-5">
  <div class="d-flex">

    <h2 class="my-4 fs-4 text-secondary">
      {{$project->title}}
    </h2>

    <div class="my-4 d-flex">
      {{-- Edit --}}
      <a href="{{route('admin.projects.edit', $project)}}" class="mx-2 btn btn-warning" title="Modifica"><i class="fa-solid fa-pencil"></i></a>

      {{-- Delete --}}
      <form
                action="{{route('admin.projects.destroy', $project)}}"
                method="POST"
                onsubmit="return confirm('confermi l\'eliminazione di {{$project->title}} ?')">
                @csrf
              @method('DELETE')

              <button
              type="submit"
              title="elimina"
              class="btn btn-danger ">
                <i class="fa-solid fa-trash-can"></i>
              </button>
              </form>
    </div>

  </div>

  <p>{{$date_formatted}}</p>
  <p>{!!$project->text!!}</p>
  <div>
    <img class="w-50" src="{{asset('storage/' . $project->image_path)}}" alt="{{$project->title}}">
  </div>

  <a href="{{route('admin.projects.index')}}" class="my-4 btn btn-secondary"><i class="fa-solid fa-rotate-left"></i></a>

</div>

@endsection
