@extends('layout.app') 
{{-- Definimos el título --}}
@section('title', 'Categorias') 
{{-- Definimos el contenido --}}
@section('content') 
   <h1 class="text-center">Crear</h1>
   <h5 class="text-center">Formulario para crear categoria</h5>
   <hr>
      <div class="container">
         <form action="/categoria/store" method="POST">
            @csrf
            <div class="row">
               <div class="col-6">
               Nombre 
               <input type="text" class="form-control" name="nombre">
               @error('nombre') 
               <span class="invalid-feedback d-block" role="alert">
               <strong>{{$message}}</strong>
               </span> 
               @enderror 
               </div>
            </div>
         
            <div class="col-12 mt-2">
               <button class="btn btn-primary">Guardar</button>
            </div>
         </form>
      </div>
   @endsection