<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'proveedor'])->get();
        return view('producto.mostrar_productos', compact('productos'));
    }
    public function create()
    {
        return view('producto.agregarProdu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required',
            'proveedor_id' => 'required',
            'precio' => 'required|numeric',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
                        ->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('producto.editarProdu', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required',
            'proveedor_id' => 'required',
            'precio' => 'required|numeric',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
                        ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
                        ->with('success', 'Producto eliminado exitosamente.');
    }
}