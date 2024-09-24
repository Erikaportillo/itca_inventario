<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar todas las categorías
        $categorias = Categoria::select(
            "categorias.codigo",
            "categorias.nombre"
        )->get();

        // Mostrar vista show.blade.php junto al listado de categorías
        return view('/categoria/show')->with(['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar categorías para llenar el select
        $categorias = Categoria::all();

        // Mostrar vista create.blade.php junto al listado de categorías
        return view('/categoria/create')->with(['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos
        $data = $request->validate([
            'nombre' => 'required',
        ]);

        // Crear una nueva categoría
        Categoria::create($data);

        // Redireccionar a la lista de categorías
        return redirect('/categoria/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar detalles de una categoría en específico (pendiente de implementación)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        // Mostrar vista update.blade.php con los datos de la categoría a editar
        return view('categoria/update')->with(['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Validar los datos actualizados
        $data = $request->validate([
            'nombre' => 'required',
        ]);

        // Actualizar la categoría
        $categoria->nombre = $data['nombre'];
        $categoria->updated_at = now();

        // Guardar los cambios
        $categoria->save();

        // Redireccionar a la lista de categorías
        return redirect('/categoria/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        // Eliminar la categoría
        Categoria::destroy($id);

        // Retornar una respuesta JSON
        return response()->json(['res' => true]);
    }
}
