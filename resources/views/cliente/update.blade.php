@extends('layout.app') 
{{-- Definimos el título --}}
@section('title', 'Clientes') 
{{-- Definimos el contenido --}}
@section('content') 
     <h1 class="text-center">Modificar</h1>
     <h5 class="text-center">Formulario para actualizar clientes</h5>
<hr>
     <div class="container">
          <form action="/cliente/update/{{$cliente->codigo}}" method="POST">

@csrf
               @method('PUT') 
               <div class="row">
                    <div class="col-6">
                         Nombre 
                         <input type="text" class="form-control" name="nombre"
                         value="{{$cliente->nombre}}"> @error('nombre') 
                         <span class="invalid-feedback d-block" role="alert">
                         <strong>{{$message}}</strong>

                         </span> 
                         @enderror 
                    </div>
                    <div>
                         Edad 
                         <input type="number" class="form-control" name="edad"
                         value="{{$cliente->edad}}"> @error('edad') 
                         <span class="invalid-feedback d-block" role="alert">
                         <strong>{{$message}}</strong>

                         </span> 
                         @enderror 
                    </div>
               </div>
                    <div class="col-12">
                    Categorias 
                    <select name="categorias" id="" class="form-control">
                    @foreach ($categorias as $item) 
                    <option value="{{$item->codigo}}">{{$item->nombre}}</option>
                    @endforeach 
                    </select>
                    @error('categorias') 
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