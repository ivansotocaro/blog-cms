@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            
            <div class="col-md-12  col-md-offset-2 text-center">
                
                <h1>Lista de Articulos</h1>
                @foreach($posts as $post)
               
                <div class="card mb-5">

                    <div class="card-header">
                        
                        {{ $post->name }}

                    </div>

                    <div class="card-body">
                        <div class="mb-4">
                            @if($post->file)
                                <img src="{{ $post->file }}" class="img-responsive">
                            @endif
                        </div>
                      
                            {{ $post->excerpt }}
                           
                            <footer class="mt-2" style="text-align: right"><a href="#" class="pull-right" style="font-size:16px"><button class="btn btn-primary">Leer más</button></a></footer>  
                    </div>

                </div>
                
                @endforeach
            </div>
            {{ $posts->render() }}
        </div>
        
    </div>
@endsection
