<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UsuarioController extends Controller
{
    public function index(){
        return view("login");
    } 

    public function autenticar(Request $request){
        $client = new Client();
        $response = $client->request('POST', 'http://127.0.0.1:3333/api/auth/login', [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,
                ]
            ]);
           
            dd($response);
    }

    public function show(){
        return view("formulario");
    }

    public function store(Request $request){
        $client = new Client();
        $response = $client->request('POST', 'http://127.0.0.1:3333/api/auth/register', [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                ]
            ]);
    }
}
