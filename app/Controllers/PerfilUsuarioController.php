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

        $data['usuario'] = $result;
        $data['OccupiedSize'] = $fileSice->getSize();
        $data['input'] = [];
        $data['TotalSize'] = $fileSice->getTotal();

        return view('userProfile_view', $data);
    }

    function deleteImageProfile()
    {
        $usuarioModel = new UsuarioSistemaModel();
        $ubicacion = $usuarioModel->getUsuario(session()->get("id_usuario"))['image'];

        $result = $usuarioModel->deleteImageProfile(session()->get("id_usuario"));
        //$result = false;
        if ($result) {

            http_response_code(200);
            if ($ubicacion != "NULL") {
                unlink($ubicacion);
            }
            $data['usuario'] = $usuarioModel->getUsuario(session()->get("id_usuario"));
            echo json_encode($data);
        } else {
            http_response_code(400);

            echo json_encode("error al actualizar el usuario");
        }
        exit;
    }

    function editUsuario()
    {
        $data = [];
        $r = $this->request->getPost();
        $usuarioModel = new UsuarioSistemaModel();

        $image = $this->request->getFile('image');
        $data['errores'] = $this->checkForm($r);
        $ubicacion = $usuarioModel->getUsuario(session()->get("id_usuario"))['image'];


        if (count($data['errores']) == 0) {
            $filecode = uniqid();

            if ($image->isValid() && !$image->hasMoved()) {
                $route = "profiles/";

                if (!empty($ubicacion) && $ubicacion != "NULL") {
                    unlink($ubicacion);
                }


                $name = $image->getClientName();

                $type = pathinfo($route . $name, PATHINFO_EXTENSION);

                $image->move('profiles', $filecode . "." . $type);

                $r['image'] = $route . $filecode . "." . $type;
            }

            $result = $usuarioModel->editUsuario(session()->get("id_usuario"), $r);
        } else {
            http_response_code(400);
            echo json_encode($data['errores']);
            exit;
        }

        if ($result) {
            http_response_code(200);
            $data['usuario'] = $usuarioModel->getUsuario(session()->get("id_usuario"));

            echo json_encode($data);
        } else {
            http_response_code(400);

            echo json_encode("error al actualizar el usuario");
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
        if (empty($data['pass'])) {
            $errores['password'] = "La contraseña actual no puede estar vacia";
        } else
        if (empty($data['newPass']) || is_numeric(strpos(" ", $data['newPass']))) {
            $errores['password'] = "Formato de la nueva contraseña no valido, tiene que estar formado (letras, numeros o caracteres especiales)";
        } else 
        if ($data['newPass'] !== $data['newPass2']) {
            $errores['password'] = "introduzca la nueva contraseña y la confirmacion deben ser la misma";
        }

        return $errores;
    }



    function checkForm($data)
    {
        $errores = [];
        $model = new UsuarioSistemaModel();

        if (isset($data['nombre']) || !empty($data['nombre'])) {
            if (!preg_match("/[A-Za-z ]+/", $data['nombre'])) {
                $errores['nombre'] = "Nombre invalido";
            }
        } else {
            $errores['nombre'] = "El campo del nombre es obligatorio";
        }

        if (isset($data['apellidos']) || !empty($data['apellidos'])) {
            if (!preg_match("/[A-Za-z ]+/", $data['apellidos'])) {
                $errores['apellidos'] = "Apellido invalido";
            }
        } else {
            $errores['apellidos'] = "El campo del los apellido obligatorio";
        }

        if (isset($data['email']) || !empty($data['email'])) {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Inserte un correo electronico valido";
            } else if ($model->existeCorreo($data['email'], session()->get("id_usuario"))) {
                $errores['email'] = "El correo electronico ya existe";
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
            $timestamp_fecha = strtotime($data['fecha_nacimiento']);
            $timestamp_actual = time();

            if (!checkdate($fecha[1], $fecha[2], $fecha[0])) {
                $errores['fecha_nacimiento'] = "formato de fecha erroneo";
            } else
            if ($timestamp_fecha > $timestamp_actual) {
                $errores['fecha_nacimiento'] = "la fecha de nacimiento no puede ser mayor a la actual";
            }
        }

        return $errores;
    }
}
