<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarraSuperiorController extends Controller
{
    public function contacto()
    {
        return view('barraSuperior.contacto');
    }
    
    public function quieneSomos()
    {
        return view('barraSuperior.quieneSomos');
    }
    
    public function dashboard()
    {
        return view('dashboard');
    }
    
}

