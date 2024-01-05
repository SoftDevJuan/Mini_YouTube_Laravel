@extends('layouts.app') 

 

@section('content') 

 

<div class="container"> 
    <div class="row"> 

        <h2>Crear un nuevo video</h2> 

        <hr> 

        <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7"> 

        @csrf 

        @method('POST') 

        <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/--> 

        @if ($errors->any()) 

        <div class="alert alert-danger"> 

            <ul> 

                @foreach ($errors->all() as $error) 

                <li>{{ $error }}</li> 

                @endforeach 

            </ul> 

        </div> 

        @endif 

        

        <div class="form-group"> 

            <label for="title">Título</label> 

            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" /> 

        </div> 

        <div class="form-group"> 

            <label for="description">Descripción</label> 

            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea> 

        </div> 

        <div class="form-group"> 

            <label for="image">Miniaturas</label> 

            <input type="file" class="form-control" id="image" name="image" /> 

        </div> 

        <div class="form-group"> 

            <label for="video">Archivo de Vídeo</label> 

            <input type="file" class="form-control" id="video" name="video" /> 

        </div> 

        <a href="/home" type="submit" class="btn btn-danger">Cancelar</a> 

        <button type="submit" class="btn btn-success">Crear Vídeo</button> 

        </form> 

    </div> 

</div> 

@endsection 