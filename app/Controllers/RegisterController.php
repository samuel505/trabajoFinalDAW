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
        $data['datos'] = $post;
        unset($data['datos']['password']);
        unset($data['datos']['password2']);
        $data['errores'] = $this->checkForm($post);
        if (count($data['errores']) == 0) {
            $result = $RegisterModel->register($post);
        }

        if (isset($result) && $result) {
            header("location: /login");
            die();
        } else {
            $data['errores']['error'] = "no se pudo crear el usuario";

            return view("register_view", $data);
        }
    }


    function checkForm($data)
    {
        $errores = [];

        if (isset($data['nombre']) || !empty($data['nombre'])) {
            if (!preg_match("/[A-Za-z ]+/", $data['nombre'])) {
                $errores['nombre'] = "Nombre invalido";
            }
        } else {
            $errores['nombre'] = "Campo oblogatorio";
        }

        if (isset($data['apellidos']) || !empty($data['apellidos'])) {
            if (!preg_match("/[A-Za-z ]+/", $data['apellidos'])) {
                $errores['apellidos'] = "Apellido invalido";
            }
        } else {
            $errores['apellidos'] = "Campo obligatorio";
        }

        if (isset($data['email']) || !empty($data['email'])) {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Inserte un correo electronico valido";
            }
        } else {
            $errores['email'] = "Campo obligatorio";
        }


        if (empty($data['password'])) {
            $errores['password'] = "Campo oblogatorio";
        } else if (is_numeric(strpos(" ", $data['password']))) {
            $errores['password'] = "Formato no valido";
        }

        if (empty($data['password'])) {
            $errores['password2'] = "Campo obligatorio";
        } else if (is_numeric(strpos(" ", $data['password2']))) {
            $errores['password2'] = "Formato no valido";
        }

        if ($data['password'] !== $data['password2']) {
            $errores['password1-2'] = "La nueva contraseña y la confirmacion deben ser la misma";
        }



        return $errores;
    }
}
