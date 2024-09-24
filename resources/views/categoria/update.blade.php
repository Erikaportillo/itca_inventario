@extends('layout.app') 
{{-- Definimos el título --}}
@section('title', 'Categorias') 
{{-- Definimos el contenido --}}
@section('content') 
     <h1 class="text-center">Modificar</h1>
     <h5 class="text-center">Formulario para actualizar categorias</h5>
<hr>
     <div class="container">
          <form action="/categoria/update/{{$categoria->codigo}}" method="POST">

@csrf
               @method('PUT') 
               <div class="row">
                    <div class="col-6">
                         Nombre 
                         <input type="text" class="form-control" name="nombre"
                         value="{{$categoria->nombre}}"> @error('nombre') 
                         <span class="invalid-feedback d-block" role="alert">
                         <strong>{{$message}}</strong>

                         </span> 
                         @enderror 
                    </div>
                   
               <div class="col-12 mt-2">
                    <button class="btn btn-primary">Guardar</button>
               </div> 
          </form> 
    </div>
@endsection