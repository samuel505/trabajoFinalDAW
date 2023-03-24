<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login_view');
    }

    function logout()
    {
        $session = session();
        $session->destroy();
        header("location: /login");
    }
    public function login()
    {
        $data = [];
        $data['errores'] = "error";

        $loginModel = new \App\Models\UsuarioSistemaModel();
        $request = service('request');

        $post = $request->getPost();
        $result = $loginModel->login($post);

        if ($result !== false) {
            $session = session();
           
            $session->set("id_usuario",$result['id_usuario']);
            header("location: /");
        } else {
            return view('login_view', $data);
        }
    }

    function checkForm($post)
    {
    }
}
