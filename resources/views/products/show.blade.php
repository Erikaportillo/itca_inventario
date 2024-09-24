{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layout.app')
{{-- Definimos el título --}}
@section('title', 'Productos')
{{-- Definimos el contenido --}}
@section('content')
<h1>Productos</h1>
<h5>Listado de productos</h5>
<hr>
{{-- Botón para ir al formulario de agregar producto --}}
<a class="btn btn-danger btn-sm" href="/products/create">Agregar nuevo producto</a>
<table class="table table-hover table-bordered mt-2">
    <tr>
        <td>Código</td>
        <td>Nombre</td>
        <td>Precio</td>
        <td>Marca</td>
        <td>Acciones</td>
    </tr>
    {{-- Listado de productos --}}
    @foreach ($productos as $item)
    <tr>
        <td>{{ $item->codigo }}</td>
        <td>{{ $item->nombre }}</td>
        <td>{{ $item->precio }}</td>
        <td>{{ $item->marca }}</td>
        <td>
            <a class="btn btn-success btn-sm" href="/products/edit/{{ $item->codigo }}">Modificar</a>
            <button class="btn btn-danger btn-sm" url="/products/destroy/{{ $item->codigo }}"
                onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
        </td>
    </tr>
    @endforeach
</table>
@endsection
@section('scripts')
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/product.js') }}"></script>
@endsection