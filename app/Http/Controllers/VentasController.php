<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.ventas', compact('ventas'));
    }

    public function ventas_admin(Request $request)
    {
        if ($request->has("busqueda")) {
            $busqueda = $request->busqueda;

            $ventas = DB::table('usuarios')
                ->join('ventas', 'ventas.usuario_id', '=', 'usuarios.id')
                ->select('usuarios.nombre', 'usuarios.apellido', 'usuarios.nickname', 'ventas.id', 'ventas.fecha', 'ventas.total')
                ->where('ventas.fecha', '=', $busqueda)
                ->get();
        } else {
            $ventas = DB::table('usuarios')
                ->join('ventas', 'ventas.usuario_id', '=', 'usuarios.id')
                ->select('usuarios.nombre', 'usuarios.apellido', 'usuarios.nickname', 'ventas.id', 'ventas.fecha', 'ventas.total')
                ->get();
        }

        $parametros=[
            "ventas"=>$ventas
        ];
        return view('ventas.ventas_admin', $parametros);
    }

    public function create()
    {
        $parametros=[
            "productos"=>Producto::all()
        ];
        return view('ventas.vender', $parametros);
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