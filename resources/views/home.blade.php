@extends('layouts.app')
@section('content')
<div class="container home-videos">
<div class="row">
@if (session('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach ($videos as $video)
<div class="col">
<div class="card h-100">
<!-- imagen del video -->
@if (Storage::disk('images')->has($video->image))
<a href="{{ route('videos.show', $video->id) }}" class="">
<img class="card-img-top" src="{{ route('imageVideo', $video->image) }}" />


</a>
@endif
<div class="card-body">
<h5 class="card-title"> {{ $video->title }}</h5>
<p class="card-text">{{ $video->name . ' ' . $video->description }}</p>
</div>
<!-- Botones de acción-->
@if (Auth::check() && Auth::user()->id == $video->id_user)
<form action="{{ route('videos.destroy', $video->id) }}" method="POST">
@csrf
@method('DELETE')
<a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning">Editar</a>
<button type="submit" class="btn btn-danger">Eliminar</button>
</form>
@endif
</div>
</div>
@endforeach
</div>
</div>
@endsection
