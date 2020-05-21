@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between  align-items-center">
           <span>Agregar Post</span>
            <!-- <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">Volver a lista de Etiquetas</a> -->
        </div>
        <div class="card-body">     
            @if ( session('agregar') )
                <div class="alert alert-success">{{ session('agregar') }}</div>
            @endif
          <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <input
            id="user_id"
            type="hidden"
            name="user_id"
            value="{{ auth()->user()->id }}"/>

            <label>Categoria</label>
            
            <select class="mb-3" style="display: block" name="category_id">
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select> 

            <label>Nombre</label>
            <input
            id="name"
            type="text"
            name="name"
            class="form-control mb-2"
            />

            <label>Slug</label>
            <input
            id="slug"
            type="text"
            name="slug"
            class="form-control mb-2"
            readonly="readonly"
            />
            
            <label>Imagen</label>
            <input type="file" name="file" class="form-control-file mb-3" id="file">

            <label>Estado</label>
            <select class="mb-3" style="display: block" name="status">
              <option value="PUBLISHED">Publicado</option>
              <option value="DRAFT">Borrador</option>
            </select> 
            
              <div class="form-group">
                  <label>Etiquetas</label>
                <div>
                  @foreach($tags as $tag)
                  <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{$tag->name}}
                  @endforeach
                </div>
              </div>
            
              <label>Extracto</label>
            <div class="form-group">
            
            <textarea 
            id="excerpt" 
            name="excerpt"
            rows="2"
            cols="78"></textarea>
            </div>

            <label >Descripción</label>
            <textarea 
            id="body" 
            name="body"></textarea>
            
         
            <button id="add" class="btn btn-primary btn-block mt-3" type="submit">Agregar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/formPost.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>;

@endsection