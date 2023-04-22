<?php

namespace App\Controllers;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('register_view');
    }

    public function register()
    {
        $RegisterModel = new \App\Models\UsuarioSistemaModel();
        $request = service('request');
        $data = [];
        $post = $request->getPost();
        $result = $RegisterModel->register($post);
        if ($result) {
            header("location: /login");
            die();
        } else {
            $data['errores'] = "no se pudo crear el usuario";
           return view("register_view",$data);
        }
    }
}
