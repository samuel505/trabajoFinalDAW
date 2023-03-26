<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        return view('register_view');
    }

    public function register()
    {
        $RegisterModel = new \App\Models\UsuarioSistemaModel();
        $request = service('request');
        
        $post = $request->getPost();
        $RegisterModel->register($post);

    }

    
}
