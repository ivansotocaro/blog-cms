@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between  align-items-center">
           <span>editar Post</span>
            <!-- <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">Volver a lista de Etiquetas</a> -->
        </div>
        <div class="card-body">     
            @if ( session('editar') )
                <div class="alert alert-success">{{ session('editar') }}</div>
            @endif
          <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input
            id="user_id"
            type="hidden"
            name="user_id"
            value="{{ auth()->user()->id }}"/>

            <label>Categoria</label>
            
            <select class="mb-3" style="display: block" name="category_id">
            @foreach($categories as $category)
              <option value="{{ $category->id }}"
                 {{ $category->id == $post->category->id ? 'selected' : '' }}>
                 {{ $category->name }}</option>
            @endforeach
            </select> 

           
            <label>Nombre</label>
            <input
            id="name"
            type="text"
            name="name"
            value="{{ $post->name }}"
            class="form-control mb-2"
            />

            <label>Slug</label>
            <input
            id="slug"
            type="text"
            name="slug"
            value="{{ $post->slug }}"
            class="form-control mb-2"
            readonly="readonly"
            />
            
            <label>Imagen</label>
            <input type="file" name="file" class="form-control-file mb-3" id="file" value="">

            <label>Estado</label>
            <select class="mb-3" style="display: block" name="status">
            @if($post->status == 'PUBLISHED')
              <option value="PUBLISHED" selected>Publicado</option>
              <option value="DRAFT">Borrador</option>
            @else
            <option value="DRAFT" selected>Borrador</option>
            <option value="PUBLISHED" >Publicado</option>
            @endif
            </select> 
            
              <div class="form-group">
                  <label>Etiquetas</label>
                <div>
                
                  @foreach($tags as $tag)
                  
                  <input type="checkbox" name="tags[]" 
                  value="{{ $tag->id }}"
                  @if (in_array($tag->id, $data)) 
                    checked="checked"
                  @endif
                 >{{$tag->name}}
                 
                  @endforeach
                </div>
              </div>
              <!-- $post->tags->tag_id ? 'checked' : '' -->
              <label>Extracto</label>
            <div class="form-group">
            
            <textarea 
            id="excerpt" 
            name="excerpt"
            rows="2"
            cols="78">{{ $post->excerpt }}</textarea>
            </div>

            <label style="display: block" >Descripción</label>
            <textarea 
            id="body" 
            class="mb-3"
            name="body"
            rows="5"
            cols="93">{{ $post->body }}</textarea>
           
         
            <button id="add" class="btn btn-primary btn-block" type="submit">Agregar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- //estaba probando -->
<!-- @foreach($data as $key => $value)

  {{$value}}
@endforeach -->

@endsection

@section('scripts')
<script src="{{ asset('js/formPost.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection

