<?php

namespace App\Controllers;

class LoginController extends BaseController
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
        die();
    }

    public function login()
    {
        $data = [];


        $loginModel = new \App\Models\UsuarioSistemaModel();
        
        $post = $this->request->getPost();

        $result = $loginModel->login($post);

        if ($result !== false) {
            $session = session();

            $session->set("id_usuario", $result['id_usuario']);
            header("location: /");
            die();
        } else {
            $data['errores'] = $errorLogin = "Correo o contraseña erroneos";
            $data['datos']=$post;
            return view('login_view', $data);
        }
    }
}
