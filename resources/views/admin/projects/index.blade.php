@extends('layouts.app')

@section('content')

<div class="container p-5 ">
  <h2 class="my-4 fs-4 text-secondary fw-bold">
    Elenco Progetti
  </h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col"><a href="{{route('admin.orderBy',['direction' => $direction ] )}}" class="text-black">Id</a></th>
        <th scope="col">Titolo</th>
        <th scope="col">Data</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
        <tr>
          <td>{{$project ->id}}</td>
          <td>{{$project ->title}}</td>
          @php
            $date = date_create($project->date);
          @endphp
          <td>{{date_format($date, 'd/m/Y')}}</td>
          <td><a href="{{route('admin.projects.show', $project)}}" class="btn btn-success" title="Vai"><i class="fa-solid fa-eye"></i></a></td>
          <td><a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning" title="Modifica"><i class="fa-solid fa-pencil"></i></a></td>
          <td>
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
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div>
    {{$projects->links()}}
  </div>

</div>

@endsection
