@extends('layouts.app')

@section('content')

 @if ( session('delete') )
 <div class="container ">
     <div class="row justify-content-center">
         <div class="col-md-10 ">
            <div class="alert alert-success">{{ session('delete') }}</div>
         </div>
     </div>
 </div>
     
@endif

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10  col-md-offset-2 ">
      <div class="card mb-5"> 

        <div class="card-header ">
          Lista de Categorias
          
          <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm text-right"
          style="float: right;">Crear</a>

        </div>

        <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Acciones</th>    
              </tr>  
            </thead>
            <tbody>
                @foreach($categories as $category)
              <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                  <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-sm">Ver</a>

                  <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>

                  <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="d-inline">

                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        
                  </form>
                  

                </td>  
              </tr>
                @endforeach
            </tbody>
          </table>

        </div> 
        <div class="card-header" style="text-align:  right">
        {{ $categories->links() }}
        </div>  
      </div>
     
    </div>
  </div>
</div>
@endsection