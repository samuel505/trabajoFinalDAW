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

        $data['usuario'] = $usuarioModel->getUsuario(session()->get("id_usuario"));
     
        $image = $this->request->getFile('archivo');
$data['errores']=$this->checkForm($r);
        if (count($data['errores']) == 0) {
            $filecode = uniqid();

            if ($image->isValid() && !$image->hasMoved()) {
                $route = "profiles/";

                $name = $image->getClientName();

                $type = pathinfo($route . $name, PATHINFO_EXTENSION);

                $image->move('profiles', $filecode . "." . $type);

                $r['image'] = $route.$filecode . "." . $type;
            }

            $result = $usuarioModel->editUsuario(session()->get("id_usuario"), $r);
        } else {
            $result = false;
        }

        if ($result) {
            http_response_code(200);

            echo json_encode($result);
        } else {
            http_response_code(400);

            echo json_encode($data['errores']);
        }
        exit;
    }

    function checkForm($data)
    {
        $errores = [];

        if (!isset($data['nombre']) || empty($data['nombre'])) {
            if (!preg_match("/[A-Za-z ]+/", $data['nombre'])) {
                $errores['nombre'] = "Campo obligatorio";
            }
        }

        if (!isset($data['apellidos']) || empty($data['apellidos'])) {
            if (!preg_match("/[A-Za-z ]+/", $data['nombre'])) {
                $errores['apellidos'] = "Campo obligatorio";
            }
        }

        if (!isset($data['email']) || empty($data['email'])) {
            $errores['email'] = "Campo obligatorio";
        } else {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "Inserte un correo electronico valido";
            }
        }

        if (isset($data['genero']) || !empty($data['genero'])) {
            if ($data['genero'] != "hombre" && $data['genero'] != "mujer") {
                $errores['genero'] = "Seleccione un genero valido";
            }
        }

        if (isset($data['pais']) && !empty($data['pais'])) {
            if (!preg_match("/[A-Z]{2}/", $data['pais'])) {
                $errores['pais'] = "Campo erroneo";
            }
        }

        if (isset($data['fecha_nacimiento']) && !empty($data['fecha_nacimiento'])) {
            $fecha = implode("/", $data['fecha_nacimiento']);
            if (!checkdate($fecha[1], $fecha[2], $fecha[0])) {
                $errores['fecha_nacimiento'] = "formato erroneo";
            }
        }

        return $errores;
    }
}
