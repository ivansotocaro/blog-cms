@extends('layouts.app')

@section('content')
    <div class="container">
 
        <div class="row justify-content-center">
            
            <div class="col-md-10  col-md-offset-2 ">
                
                <h1 class="text-center">Lista de Articulos</h1>
                @foreach($posts as $post)
               
                <div class="card mb-5">

                    <div class="card-header text-center">
                        
                        {{ $post->name }}

                    </div>

                    <div class="card-body">
                        <div class="mb-4 text-center">
                            @if($post->file)
                                <img src="{{ $post->file }}" class="img-responsive" width ='700' height='300'>
                            @endif
                        </div>
                      
                            {{ $post->excerpt }}
                           
                            <footer class="mt-2" style="text-align: right">

                                <a href="{{ route('detallepost', $post->slug) }}" class="pull-right" style="font-size:16px">
                                <button class="btn btn-primary">Leer más</button>
                                </a>

                            </footer>  
                    </div>

                </div>
                
                @endforeach
            </div>
                
        </div>
        {{ $posts->render() }}
    </div>
@endsection
