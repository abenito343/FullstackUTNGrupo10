<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*
        $productos = DB::select("SELECT * FROM productos");
        */
        if($request->has("busqueda")){
            $busqueda = $request->busqueda;

            $proveedores =  DB::table("proveedores")
                            ->select("*")
                            ->where("razonSocial", "like", "%".$busqueda."%")
                            ->orderBy("razonSocial", "desc")
                            ->get();
    }
        else{
            /*
            $productos = DB::table("productos")
                            ->select("nombre_producto as nombre", "precio_producto as precio")
                            ->orderBy("nombre_producto", "desc")
                            ->get();
            */

            $proveedores = Proveedor::all();
        }

        $parametros = [
            "proveedores" => $proveedores
        ];


        return view('proveedor.mostrar_proveedores', $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.registrar_proveedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            "razonSocial" => ['required'],
            "direccion" => ['required'],
            "telefono" => ['required'],
            "correo" => ['required'],
            ], 
            [
            "required" => "Este campo es obligatorio",
            ]
        );

        $datos['razonSocial'] = ucwords(strtolower($datos['razonSocial']));
        $datos['direccion'] = ucwords(strtolower($datos['direccion']));

        Proveedor::create($datos);
    
        return response()->redirectTo("/proveedor")->with("success", "Se registro con exito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view("proveedor.editar_proveedor", ["proveedor" => $proveedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $datos = $request->validate([
            "razonSocial" => ['required'],
            "direccion" => ['required'],
            "telefono" => ['required'],
            "correo" => ['required']
            ], 
            [
            "required" => "Este campo es obligatorio",
            ]
        );

        $proveedor->razonSocial = $datos["razonSocial"];
        $proveedor->direccion = $datos["direccion"];
        $proveedor->telefono = $datos["telefono"];
        $proveedor->correo = $datos["correo"];

        $proveedor->save();

        return redirect("/proveedor")->with("success", "Se actualizo el proveedor de forma correcta");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $respuesta = $proveedor->delete();

        if($respuesta){
            return redirect("/proveedor")->with("success", "Se elimino el proveedor correctamente");
        }
        else{
            return redirect("/proveedor")->with("fail", "No se pudo eliminar");
        }
    }
}
