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
            "dni" => ['required', 'numeric', 'max:8'],
            "nickname" => ['required', 'unique:usuarios,nickname'],
            "password" => ['required', 'confirmed'],
            "rol" => ['required']
            ], 
            [
            "required" => "Este campo es obligatorio",
            "password.confirmed" => "Las contraseñas no coinciden",
            "dni.numeric" => "El DNI debe ser un numero",
            "dni.max" => "El DNI debe tener 8 digitos",
            "nickname.unique" => "El nickname ya existe"
            ]
        );
    
        // Capitalizar la primera letra de nombre y apellido
        $datos["nombre"] = ucfirst(strtolower($datos["nombre"]));
        $datos["apellido"] = ucfirst(strtolower($datos["apellido"]));
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
            "dni" => ['required', 'numeric'],
            "nickname" => ['required'],
            "rol" => ['required']
            ], 
            [
            "required" => "Este campo es obligatorio",
            "dni.numeric" => "El DNI debe ser un numero"
            ]
        );
    
        // Capitalizar la primera letra de nombre y apellido
        $datos["nombre"] = ucfirst(strtolower($datos["nombre"]));
        $datos["apellido"] = ucfirst(strtolower($datos["apellido"]));
    
        $usuario->nombre = $datos["nombre"];
        $usuario->apellido = $datos["apellido"];
        $usuario->dni = $datos["dni"];
        $usuario->nickname = $datos["nickname"];
        $usuario->rol = $datos["rol"];
    
        $usuario->save();
    
        return redirect("/usuario")->with("success", "Se actualizo el usuario de forma correcta");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_edit(User $usuario)
    {
        return view("usuario.editar_password", ["usuario" => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_update(Request $request, User $usuario)
    {
        $datos = $request->validate([
            "password" => ['required', 'confirmed']
            ], 
            [
            "required" => "Este campo es obligatorio",
            "password.confirmed" => "Las contraseñas no coinciden"
            ]
        );

        $usuario["password"] = bcrypt($datos["password"]);

        $usuario->save();

        return redirect("/usuario")->with("success", "Se actualizo la contraseña de forma correcta");
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