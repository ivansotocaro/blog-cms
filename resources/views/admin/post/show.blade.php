@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header d-flex justify-content-between  align-items-center">
           <span>Ver Categorias</span>
            <!-- <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">Volver a lista de Etiquetas</a> -->
        </div>

        <div class="card-body">    

            <strong>Categori: </strong>
            <p style="display: inline-block">{{ $post->category->name }}</p>

            <br>

            <strong>Nombre: </strong>
            <p style="display: inline-block">{{ $post->name }}</p>

            <br>

            <strong>Slug: </strong>
            <p style="display: inline-block">{{ $post->slug }}</p>
            <br>
            
            <strong class="mb-3">Imagen: </strong><br>
            <img src="{{$post->file}}" width="560" height="300" class="mb-3" >

            <br>

            <strong>Estado: </strong>
            <p style="display: inline-block">{{ $post->status }}</p>

            <br>

            <strong>Etiquetas: </strong>
            @foreach($post->tags as $post_tag)
            <p style="display: inline-block">{{ $post_tag->name }}</p>
            @endforeach
            <br>

            <strong>Extracto: </strong>
            <p style="display: inline-block">{{ $post->excerpt }}, </p>

            <br>

            <strong>Descripción: </strong>   
             <p>{{ $post->body }}</p>
                
            
            
                        
        </div>

      </div>
    </div>
  </div>
</div>
@endsection