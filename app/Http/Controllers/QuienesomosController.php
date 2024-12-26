<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuienesomosController extends Controller
{
    public function quieneSomos()
    {
        return view('barraSuperior.quieneSomos');
    }
}