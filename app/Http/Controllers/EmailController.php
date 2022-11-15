<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RegistroMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function email_inicio()
    {
        return view('emails.registroMail');
    }
    public function email_enviar($user, $metauser)
    {   
        $nombre = $user->name;
        $apellido_p = $metauser->apellido_paterno;
        // $apellido_m = $metauser->apellido_materno;
        $correo = new RegistroMail($nombre);
        Mail::to($user->email)->send($correo);
    }
}
