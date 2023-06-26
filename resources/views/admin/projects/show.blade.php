@extends('layouts.app')

@section('content')
<div class="container p-5">
  <h2 class="my-4 fs-4 text-secondary">
    {{$project->title}}
  </h2>

  <p>{{$date_formatted}}</p>
  <p>{!!$project->text!!}</p>
  <div>
    <img class="w-50" src="{{asset('storage/' . $project->image_path)}}" alt="{{$project->title}}">
  </div>

  <a href="{{route('admin.projects.index')}}" class="my-4 btn btn-success">Indietro</a>

</div>

@endsection
