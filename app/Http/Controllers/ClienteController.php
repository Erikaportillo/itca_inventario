<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar todos los clientes
        $clientes = Cliente::select(
            "clientes.codigo",
            "clientes.nombre",
            "clientes.edad",
            "categorias.nombre as categorias"
        )
        ->join("categorias", "categorias.codigo", "=", "clientes.categorias")
        ->get();

        // Mostrar vista show.blade.php junto al listado de clientes
        return view('/cliente/show')->with(['clientes' => $clientes]);
    }

    public function create()
    {
        // Listar categorías para llenar el select
        $categorias = Categoria::all();

        // Mostrar vista create.blade.php junto al listado de categorías
        return view('/cliente/create')->with(['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        // Validar campos
        $data = $request()->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'categorias' => 'required'
        ]);

        // Crear nuevo cliente
        Cliente::create($data);

        // Redireccionar al listado de clientes
        return redirect('/cliente/show');
    }

    public function show($id)
    {
        //
    }

    public function edit(Cliente $cliente)
    {
        // Listar categorías para llenar el select
        $categorias = Categoria::all();

        // Mostrar vista update.blade.php junto al cliente y categorías
        return view('cliente/update')->with(['cliente' => $cliente, 'categorias' => $categorias]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        // Validar campos
        $data = $request->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'categorias' => 'required'
        ]);

        // Reemplazar datos anteriores por los nuevos 
        $cliente->nombre = $data['nombre'];
        $cliente->edad = $data['edad'];
        $cliente->categorias = $data['categorias'];
        $cliente->updated_at = now();

        //Enviar a guardar la actualización
        $cliente->save();

        //Redireccionar
        return redirect('/cliente/show');
    }

    public function destroy( string $id)
    {
        // Eliminar el cliente con el id recibido
        Cliente::destroy($id);

        // Retornar una respuesta JSON
        return response()->json(['res' => true]);
    }
}
