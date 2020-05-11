@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
           <span>Editar Etiquetas</span>
            <!-- <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">Volver a lista de Etiquetas</a> -->
        </div>
        <div class="card-body">     
            @if ( session('editar') )
                <div class="alert alert-success">{{ session('editar') }}</div>
            @endif
           
          <form method="post" action="{{ route('tags.update', $tag->id) }}">
            @method('PUT')
            @csrf
            
            <input
            id="name"
            type="text"
            name="name"
            value="{{ $tag->name }}"
            class="form-control mb-2"
            />

            <input
            id="slug"
            type="text"
            name="slug"
            value="{{ $tag->slug }}"
            class="form-control mb-2"
            />
            
            <button id="add" class="btn btn-primary btn-block" type="submit">Editar</button>

          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/formEtiqueta.js') }}"></script>
@endsection