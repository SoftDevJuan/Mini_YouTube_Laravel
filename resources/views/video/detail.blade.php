@extends('layouts.app')
@section('content')
<div class="container detail-video">
<div class="row">
@if (session('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
</div>
<h2>{{ $video->title }}</h2>
<div>
    <!--video-->
<div class="video-content">
<video width="500" height="350" controls autoplay muted>
<source src="{{ route('fileVideo', $video->video_path) }}" type="video/mp4" />
Tu navegador no es compatible con HTML5
</video>
</div>
<!-- descripción-->
<div class="panel panel-default video-data">
<div class="panel-heading">
<div class="panel-title">
Subido por <strong>{{ $video->name}}</strong> el
{{ $video->created_at }}
</div>
</div>
<div class="description">
{{ $video->description }}
</div>
</div>
<!--comentarios -->
<div>
@include('comments')
</div>
</div>
</div>
@endsection
