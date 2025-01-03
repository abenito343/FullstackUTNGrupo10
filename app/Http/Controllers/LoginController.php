<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $datos = $request->validate([
            "usuario" => ["required"],
            "password" => ["required"]
        ], [
            "usuario.required" => "Este campo es obligatorio",
            "password.required" => "Este campo es obligatorio"
        ]);

        //if ($datos["usuario"] == "admin" && $datos["password"] == "admin")
        if (auth()->attempt(["nickname" => $datos["usuario"], "password" => $datos["password"]]))
            {
                $usuario = auth()->user();

                if ($usuario->rol == 'admin') {
                    return response()->redirectTo("/dashboard");
                    
                } elseif ($usuario->rol == 'vendedor') {

                    return response()->redirectTo("/ventas");
                }
                
            }
            else 
            {
                return response ()->redirectTo("/")->with("fail", "No pudo acreditarse al usuario");
            }
    }
    
    public function logout()
    {
        auth()->logout();
        return response()->redirectTo("/");
    }

}
