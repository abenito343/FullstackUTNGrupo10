<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetalleVenta;

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

    public function store1(Request $request)
    {
        $request->validate([
            // Validaciones necesarias
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta registrada exitosamente.');
    }

    public function store(Request $request)
    {
        // Validar y procesar los datos del carrito
        $carrito = $request->input('carrito');
        $total = $request->input('total');
    
        // Obtener el usuario autenticado
        $usuario_id = auth()->user()->id;
    
        // Guardar la venta en la base de datos
        $venta = new Venta();
        $venta->total = $total;
        $venta->usuario_id = $usuario_id; // Asignar el usuario_id
        $venta->save();
    
        // Guardar los detalles de la venta
        foreach ($carrito as $item) {
            $detalle = new DetalleVenta();
            $detalle->venta_id = $venta->id;
            $detalle->producto_id = $item['id'];
            $detalle->cantidad = $item['cantidad'];
            $detalle->subTotal = $item['precio'];
            $detalle->save();
        }
    
        return response()->json(['success' => true]);
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