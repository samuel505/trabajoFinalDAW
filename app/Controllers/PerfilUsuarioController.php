<?php

namespace App\Controllers;

use App\Models\UsuarioSistemaModel;

class PerfilUsuarioController  extends BaseController
{
    function index()
    {
        $data = [];
        $fileSice = new HomeController();
        $usuarioModel = new UsuarioSistemaModel();
        $result = $usuarioModel->getUsuario(session()->get("id_usuario"));

        // var_dump($result);die();
        $data['usuario'] = $result;
        $data['OccupiedSize'] = $fileSice->getSize();
        $data['input'] = [];
        $data['TotalSize'] = $fileSice->getTotal();

        return view('userProfile_view', $data);
    }

    function editUsuario()
    {
        $data = [];
        $r = $this->request->getPost();
        $usuarioModel = new UsuarioSistemaModel();



        $image = $this->request->getFile('image');
        $data['errores'] = $this->checkForm($r);

        if (count($data['errores']) == 0) {
            $filecode = uniqid();

            if ($image->isValid() && !$image->hasMoved()) {
                $route = "profiles/";

                $name = $image->getClientName();

                $type = pathinfo($route . $name, PATHINFO_EXTENSION);

                $image->move('profiles', $filecode . "." . $type);

                $r['image'] = $route . $filecode . "." . $type;
            }

            $result = $usuarioModel->editUsuario(session()->get("id_usuario"), $r);
        } else {
            $result = false;
        }

        if ($result) {
            http_response_code(200);
            $data['usuario'] = $usuarioModel->getUsuario(session()->get("id_usuario"));

            echo json_encode($data);
        } else {
            http_response_code(400);

            echo json_encode($data['errores']);
        }
        exit;
    }

    function editPassword()
    {
        $data = [];

        $usuarioModel = new UsuarioSistemaModel();
        $result = $usuarioModel->getUsuario(session()->get("id_usuario"));
        $pass = $this->request->getPost();

        if (password_verify($pass['pass'], $result['password'])) {


            $data['errores'] = $this->checkFormPassword($pass);


            if (count($data['errores']) == 0) {
                if ($usuarioModel->editPasswordUsuario(session()->get("id_usuario"), $pass)) {
                    http_response_code(200);
                    echo json_encode(true);
                } else {
                    http_response_code(400);
                    $data['errores'] = "error al actualizar la contraseña";
                    echo json_encode($data['errores']);
                }
            } else {
                http_response_code(400);
                echo json_encode($data['errores']);
            }
        } else {
            http_response_code(400);
            $errores['password'] = "La contraseña actual introducida no es correcta";
            $data['errores'] = $errores;
            echo json_encode($data['errores']);
        }
        exit;
    }

    function checkFormPassword($data)
    {

        $errores = [];
        if (empty($data['newPass'])) {
            $errores['password'] = "La contraseña actual no puede estar vacia";
        } else
        if (is_numeric(strpos(" ", $data['newPass']))) {
            $errores['password'] = "Formato de contraseña no valido, solo son validos: (letras, numeros y caracteres especiales";
        } else 
        if ($data['newPass'] !== $data['newPass2']) {
            $errores['password'] = "introduzca la nueva contraseña y la confirmacion deben ser la misma";
        }

        return $errores;
    }



    function checkForm($data)
    {
        $errores = [];

        if (isset($data['nombre']) || empty($data['nombre'])) {
            if (!preg_match("/[A-Za-z ]+/", $data['nombre'])) {
                $errores['nombre'] = "El nombre solo puede contener letras y espacios";
            }
        } else {
            $errores['nombre'] = "El campo del nombre es obligatorio";
        }

        if (isset($data['apellidos']) || empty($data['apellidos'])) {
            if (!preg_match("/[A-Za-z ]+/", $data['apellidos'])) {
                $errores['apellidos'] = "Los apellidos solo puede contener letras y espacios";
            }
        } else {
            $errores['apellidos'] = "El campo del los apellidos obligatorio";
        }

        if (isset($data['email']) || empty($data['email'])) {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Inserte un correo electronico valido";
            }
        } else {
            $errores['email'] = "El campo de correo electronico es obligatorio";
        }

        if (isset($data['genero']) || !empty($data['genero'])) {
            if ($data['genero'] != "hombre" && $data['genero'] != "mujer") {
                $errores['genero'] = "Seleccione un genero valido";
            }
        }

        if (isset($data['pais']) && !empty($data['pais'])) {
            if (!preg_match("/[A-Z]{2}/", $data['pais'])) {
                $errores['pais'] = "Campo de pais erroneo";
            }
        }

        if (isset($data['fecha_nacimiento']) && !empty($data['fecha_nacimiento'])) {
            $fecha = explode("-", $data['fecha_nacimiento']);

            if (!checkdate($fecha[1], $fecha[2], $fecha[0])) {
                $errores['fecha_nacimiento'] = "formato de fecha erroneo";
            }
        }

        return $errores;
    }
}
