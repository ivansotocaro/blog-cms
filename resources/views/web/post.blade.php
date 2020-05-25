@extends('layouts.app')

@section('content')
    <div class="container">
 
        <div class="row justify-content-center">
            
            <div class="col-md-10  col-md-offset-2 ">
                
                <h1 class="text-center">{{ $post->name }}</h1>
               
               
                <div class="card mb-5">

                    <div class="card-header ">
                        
                       Categoria:
                       <a href="{{ route('categoria', $post->category->slug) }}">{{ $post->category->name }}</a>

                    </div>

                    <div class="card-body">
                        <div class="mb-4 text-center">
                            @if($post->file)
                                <img src="{{ $post->file }}" class="img-responsive" width='700' height='300'>
                            @endif
                        </div>
                      
                            {{ $post->excerpt }}
                            <hr>
                            {{ $post->body }}
                            <footer class="mt-3 card-header">
                                Etiquetas:
                                @foreach($post->tags as $tag)
                                <a href="{{ route('etiqueta', $tag->slug) }}">
                                    {{$tag->name}}
                                </a>
                                @endforeach
                            </footer>  
                    </div>

                </div>
                
               
            </div>
            
        </div>
        
    </div>


  @if(Auth::check() == 'true')
    <div class="container">
 
      <div class="row justify-content-center">
        
        <div class="col-md-10  col-md-offset-2 ">
            
            <div class="card mb-5">

                <div class="card-header ">
                    <strong>Commentarios</strong>
                </div>

                <div class="card-body">
                @if ( session('agregar') )
                    <div class="alert alert-success">{{ session('agregar') }}</div>
                @endif
                <form  method="post" action="{{ route('comment.store') }}">
                 @csrf

                <input
                id="post_id"
                type="hidden"
                name="post_id"
                value="{{ $post->id }}"/>
               
                <textarea 
                name="body" 
                id="body" 
                cols="100" 
                rows="5"></textarea>

                </div>

                <div class="mb-3 mr-4" style="text-align: right">
                  <button class="btn btn-primary btn-sm" type="submit">Agregar</button>
                </div>

                </form>
               
            </div>
            
        </div>
     
      </div>
        
    </div>
  @else
  <div class="container mb-4">
    <div class="row justify-content-center">
      <strong>No puedes realizar comentarios, debes registrarse primero</strong>
    </div>
  </div>
  @endif


  

 



    @foreach($comments as $key => $comment)
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10  col-md-offset-2 ">
          <div class="card mb-5">

            <div class="card-header ">
              <!-- traigo todos los usuarios de su modelo y los reitero haciendo una comparacion para poder mostrar el nombre del usuario que realizo ese comentario -->
            @foreach($users as $key => $user)
              <strong>
                @if($user->id == $comment->user_id)
                  {{ $user->name }}
                  
                   
                @endif
              </strong>
              @endforeach
            </div>

            <div class="card-body">
              <p>{{$comment->body}}</p>
            </div>

            <div class="card-footer text-muted">
                    Creado: {{ $comment->created_at }}
            </div>

          </div>
        </div>
      </div>
    </div>
    @endforeach

  <!-- @foreach($comments as $key => $value)

    {{$value}}
  @endforeach  -->

 


@endsection