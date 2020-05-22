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
@endsection