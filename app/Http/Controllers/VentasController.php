<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetalleVenta;

class VentasController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Venta::where('usuario_id', $user->id);

        if ($request->has('fecha') && $request->fecha != null) {
            $query->whereDate('fecha', $request->fecha);
        }

        if ($request->filled('total')) {
            $query->where('total', $request->input('total'));
        }

        if ($request->has('busqueda_nombre') && $request->busqueda_nombre != null) {
            $query->whereHas('usuario', function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->input('busqueda_nombre') . '%')
                  ->orWhere('apellido', 'like', '%' . $request->input('busqueda_nombre') . '%');
            });
        }

        $ventas = $query->get();

        return view('ventas.ventas', compact('ventas'));
    }

    public function ventas_admin(Request $request)
    {
        $query = DB::table('usuarios')
            ->join('ventas', 'ventas.usuario_id', '=', 'usuarios.id')
            ->select('usuarios.nombre', 'usuarios.apellido', 'usuarios.nickname', 'ventas.id', 'ventas.fecha', 'ventas.total');
    
        if ($request->has('busqueda') && $request->busqueda != null) {
            $query->whereDate('ventas.fecha', $request->busqueda);
        }
    
        if ($request->has('busqueda_nombre') && $request->busqueda_nombre != null) {
            $query->where(function ($q) use ($request) {
                $q->where('usuarios.nombre', 'like', '%' . $request->busqueda_nombre . '%')
                  ->orWhere('usuarios.apellido', 'like', '%' . $request->busqueda_nombre . '%');
            });
        }
    
        $ventas = $query->get();
    
        return view('ventas.ventas_admin', compact('ventas'));
    }
    
    public function detalle_venta_admin(Venta $venta)
    {
        $detalles = DB::table('ventas')
            ->join('detalle_ventas', 'ventas.id', '=', 'detalle_ventas.venta_id')
            ->join('productos', 'detalle_ventas.producto_id', '=', 'productos.id')
            ->select('ventas.id as factura', 'ventas.fecha', 'ventas.total',
                'productos.id as codigo', 'productos.nombre', 'productos.precio',
                'detalle_ventas.cantidad', 'detalle_ventas.subtotal')
            ->where('ventas.id', '=', $venta->id)
            ->get();

        $parametros=[
            "detalles"=>$detalles
        ];

        return view('ventas.detalle_venta_admin', $parametros);
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
            $detalle->subTotal = $item['precio'] * $item['cantidad'];
            $detalle->save();

            // Actualizar el stock del producto
            $producto = Producto::find($item['id']);
            $producto->stock -= $item['cantidad'];
            $producto->save();
    
        }
    
        return response()->json(['success' => true]);
    }


    public function show($id)
    {
        // Obtener la venta por ID
        $venta = Venta::findOrFail($id);
    
        // Obtener los detalles de la venta
        $detalles = $venta->detalles; // Asumiendo que tienes una relación 'detalles' en el modelo Venta
    
        return view('ventas.detalleVentas', compact('venta', 'detalles'));
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