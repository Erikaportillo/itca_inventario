<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar todos los productos
        $productos = Product::select(
            "productos.codigo",
            "productos.nombre",
            "productos.precio",
            "marcas.nombre as marca"
        )
        ->join("marcas", "marcas.codigo", "=", "productos.marca")
        ->get();

        // Mostrar vista show.blade.php junto al listado de productos
        return view('/products/show')->with(['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar marcas para llenar select
        $marcas = Branch::all();

        // Mostrar vista create.blade.php junto al listado de marcas
        return view('/products/create')->with(['marcas' => $marcas]);
    }


    public function store(Request $request)
    {
        // Validar campos
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'marca' => 'required'
        ]);

        // Crear nuevo producto
        Product::create($data);

        // Redireccionar al listado de productos
        return redirect('/products/show');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Listar marcas para llenar select
        $marcas = Branch::all();

        // Mostrar vista update.blade.php junto al producto y marcas
        return view('products/update')->with(['producto' => $product, 'marcas' => $marcas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validar campos
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'marca' => 'required'
        ]);

        // Reemplazar datos anteriores por los nuevos 
        $product->nombre = $data['nombre'];
        $product->precio = $data['precio'];
        $product->marca = $data['marca'];
        $product-> updated_at = now();

        //Enviar a guardar la actualización
        $product->save();

        //Redireccionar
        return redirect('/products/show');
    }

    public function destroy(string $id)
    { 
        // Eliminar el producto con el id recibido
        Product::destroy($id);

        // Retornar una respuesta JSON
        return response()->json(['res' => true]);
    }
}


