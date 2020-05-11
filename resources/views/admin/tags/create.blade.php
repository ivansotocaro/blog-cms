@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between  align-items-center">
           <span>Agregar Etiquetas</span>
            <!-- <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">Volver a lista de Etiquetas</a> -->
        </div>
        <div class="card-body">     
            @if ( session('agregar') )
                <div class="alert alert-success">{{ session('agregar') }}</div>
            @endif
          <form method="post" action="{{ route('tags.store') }}">
            @csrf
            <input
            id="name"
            type="text"
            name="name"
            placeholder="Nombre.."
            class="form-control mb-2"
            />

            <input
            id="slug"
            type="text"
            name="slug"
            placeholder="Slug"
            class="form-control mb-2"
            />

            <button id="add" class="btn btn-primary btn-block" type="submit">Agregar</button>

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