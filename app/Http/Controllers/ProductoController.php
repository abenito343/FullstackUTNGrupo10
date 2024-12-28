<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has("busqueda")) {
            $busqueda = $request->busqueda;

            // Obtener productos con relación 'categoria' cargada usando Eloquent
            $productos = Producto::with('categoria') // Cargar la relación 'categoria'
                ->where('nombre', 'like', "%$busqueda%") // Buscar por nombre
                ->orWhere('descripcion', 'like', "%$busqueda%") // O buscar por descripción
                ->orderBy("nombre", "desc") // Ordenar por nombre
                ->get();
        } else {
            // Si no hay búsqueda, obtener todos los productos con su relación 'categoria'
            $productos = Producto::with('categoria')->get();
        }

        $parametros = [
            "productos" => $productos
        ];


        return view('producto.mostrar_productos', $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parametros = [
            "categorias" => Categoria::all(),
            "proveedores"=>Proveedor::all()
        ];
        
        return view('producto.registrar_producto', $parametros);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $datos = $request->validate([
            "nombre" => ['required'],
            "descripcion" => ['required'],
            "precio" => ['required'],
            "stock" => ['required'],
            "img" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            "categoria" => ['required'],
            "proveedor" => ['required']
        ], 
        [
            "required" => "Este campo es obligatorio",
            "image" => "El archivo debe ser una imagen válida",
            "mimes" => "La imagen debe ser de tipo jpeg, png, jpg, gif o svg",
            "max" => "La imagen no debe superar los 2 MB"
        ]);
    
        // Verificar si se subió un archivo de imagen
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            // Obtener el archivo de imagen
            $image = $request->file('img');
            
            // Crear un nombre único para la imagen (usamos 'time()' para evitar colisiones)
            $imageName = $image->getClientOriginalName(); // Asigna un nombre único con la extensión correcta
    
            // Mover la imagen a la carpeta 'public/img'
            $image->move(public_path('img'), $imageName);
    
            // Guardar la ruta relativa de la imagen en la base de datos
            $datos['img'] = 'img/' . $imageName;  // Guarda la ruta relativa en la base de datos
        }

        $datos['categoria_id'] = $request->categoria; // Asignar 'categoria' al campo 'categoria_id'
        $datos['proveedor_id'] = $request->proveedor;
    
        // Crear el producto con los datos
        Producto::create($datos);
    
        return redirect("/producto")->with("success", "Se registró con éxito!");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
    
        if ($producto) {
            // Devolver los detalles en formato JSON
            return response()->json([
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'img'=>asset($producto->img)
            ]);
        }

        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {   
        $parametros = [
            "categorias" => Categoria::all(),
            "proveedores"=>Proveedor::all(),
            "producto"=>$producto
        ];
        return view("producto.editar_producto", $parametros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
{
    // Validación de los datos recibidos
    $datos = $request->validate([
        "img" => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // 'nullable' para permitir que no sea obligatorio
        "categoria" => ['required'],
        "proveedor" => ['required']
    ], 
    [
        "required" => "Este campo es obligatorio",
        "image" => "El archivo debe ser una imagen válida",
        "mimes" => "La imagen debe ser de tipo jpeg, png, jpg, gif o svg",
        "max" => "La imagen no debe superar los 2 MB"
    ]);

    $producto->nombre = $request["nombre"];
    $producto->descripcion = $request["descripcion"];
    $producto->precio = $request["precio"];
    $producto->stock = $request["stock"];
    $producto->categoria_id = $request["categoria"];
    $producto->proveedor_id = $request["proveedor"];

    if ($request->hasFile('img') && $request->file('img')->isValid()) {
        // Obtener el archivo de imagen
        $image = $request->file('img');
        
        $imageName = $image->getClientOriginalName(); 
    
        // Mover la imagen a la carpeta 'public/img'
        $image->move(public_path('img'), $imageName);
    
        // Guardar la ruta relativa de la imagen en la base de datos
        $producto->img = 'img/' . $imageName;  // Guarda la ruta relativa en la base de datos
    }

    // Guardar el producto actualizado en la base de datos
    $producto->save();

    return redirect("/producto")->with("success", "Se actualizó el producto correctamente");
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $respuesta = $producto->delete();

        if($respuesta){
            return redirect("/producto")->with("success", "Se elimino el producto correctamente");
        }
        else{
            return redirect("/producto")->with("fail", "No se pudo eliminar");
        }
    }
}
