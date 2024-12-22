<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
    {
        $usuarios = User::all();

        /*
        if(!auth()->check()){
            return redirect("/");
        }
        */

        $parametros = [
            "usuarios" => $usuarios
        ];

        return view('usuario.mostrar_usuarios', $parametros);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.registrar_usuario');
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
            "nombre" => ['required'],
            "apellido" => ['required'],
            "dni" => ['required'],
            "nickname" => ['required'],
            "password" => ['required', 'confirmed']
            ], 
            [
            "required" => "Este campo es obligatorio",
            "password.confirmed" => "Las contraseñas no coinciden"
            ]
        );

        $datos["password"] = bcrypt($datos["password"]);

        User::create($datos);
    
        return response()->redirectTo("/usuario")->with("success", "Se registro con exito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id);

        $parametros = [
            "usuarios" => $user
        ];

        return view('usuario.mostrar_usuarios', $parametros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return view("usuario.editar_usuario", ["usuario" => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $datos = $request->validate([
            "nombre" => ['required'],
            "apellido" => ['required'],
            "dni" => ['required'],
            "nickname" => ['required']
            ], 
            [
            "required" => "Este campo es obligatorio",
            ]
        );

        $usuario->nombre = $datos["nombre"];
        $usuario->apellido = $datos["apellido"];
        $usuario->dni = $datos["dni"];
        $usuario->nickname = $datos["nickname"];

        $usuario->save();

        return redirect("/usuario")->with("success", "Se actualizo el usuario de forma correcta");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        
        $respuesta = $usuario->delete();

        if($respuesta){
            return redirect("/usuario")->with("success", "Se elimino el producto correctamente");
        }
        else{
            return redirect("/usuario")->with("fail", "No se pudo eliminar");
        }
    }
}
