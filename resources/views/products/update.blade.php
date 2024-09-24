@extends('layout.app')

{{-- Definimos el título --}}
@section('title', 'Productos')

{{-- Definimos el contenido --}}
@section('content')
    <h1 class="text-center">Modificar</h1>
    <h5 class="text-center">Formulario para actualizar productos</h5>
    <hr>

    <div class="container">
        <form action="/products/update/{{ $producto->codigo }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Campo para el nombre --}}
                <div class="col-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Campo para el precio --}}
                <div class="col-6">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" name="precio" value="{{ $producto->precio }}">
                    @error('precio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Selección de la marca --}}
            <div class="col-12 mt-3">
                <label for="marca">Marca</label>
                <select name="marca" id="marca" class="form-control">
                    @foreach ($marcas as $item)
                        <option value="{{ $item->codigo }}" {{ $item->codigo == $producto->marca ? 'selected' : '' }}>
                            {{ $item->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('marca')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Botón de guardar --}}
            <div class="col-12 mt-4">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection

