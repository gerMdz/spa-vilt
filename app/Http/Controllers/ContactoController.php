<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function contacto(Request $request)
    {
        dd($request->all());
    }
}
