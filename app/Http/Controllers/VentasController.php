<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.ventas', compact('ventas'));
    }

    public function create()
    {
        return view('ventas.vender');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validaciones necesarias
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta registrada exitosamente.');
    }

    public function show(Venta $venta)
    {
        return view('ventas.detalleVentas', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        return view('ventas.editar_venta', compact('venta'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            // Validaciones necesarias
        ]);

        $venta->update($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta eliminada exitosamente.');
    }
}