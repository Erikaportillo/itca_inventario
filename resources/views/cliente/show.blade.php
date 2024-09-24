@extends('layout.app') 
{{-- Definimos el título --}}
@section('title', 'Clientes') 
{{-- Definimos el contenido --}}
@section('content') 
      <h1>Clientes</h1>
      <h5>Listado de clientes</h5>
      <hr>
      {{-- Botón para ir al formulario de agregar clientes --}}
      <a class="btn btn-danger btn-sm" href="/cliente/create">Agregar nuevo cliente</a>
      <table class="table table-hover table-bordered mt-2">
            <tr>
                  <td>Código</td>
                  <td>Nombre</td>
                  <td>Edad</td>
                  <td>Categoria</td>
                  <td>Acciones</td>

            </tr>
            {{-- Listado de clientes --}}
            @foreach ($clientes as $item) 
            <tr>
                  <td>{{ $item->codigo }}</td>
                  <td>{{ $item->nombre }}</td>
                  <td>{{ $item->edad }}</td>
                  <td>{{ $item->categorias }}</td>
                 

                  <td>
                    <a class="btn btn-success btn-sm" href="/cliente/edit/{{ $item->codigo }}">Modificar</a>
                    <button class="btn btn-danger btn-sm" url="/cliente/destroy/{{ $item->codigo }}"
                        onclick="destroy(this)"token="{{ csrf_token() }}">Eliminar</button>
                </td>
            </tr>
            @endforeach
       </table>
@endsection
@section('scripts') 
      {{-- SweetAlert --}}
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      {{-- JS --}}
      <script src="{{ asset('js/cliente.js') }}"></script>
@endsection
 