<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;

class PageController extends Controller
{
    public function __construct(){
        $this->middleware('example', ['only' => ['home']]);
    }

    public function home()
    {
        return view('home');
    }

    public function saludos($nombre = 'Invitado')
    {
        return view('saludos', compact('nombre'));
    }
}
