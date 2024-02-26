<?php

namespace App\Http\Controllers;

use App\Mail\MensajeContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function contacto(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email:filter'],
            'message' => ['required', 'min:10']
        ]);

        Mail::to(config('mail.to.address'), config('mail.to.name'))
            ->send(new MensajeContacto($request->email, $request->message))
        ;

        return redirect('/')
            ->with('contacted', true);
    }
}
