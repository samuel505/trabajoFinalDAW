<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioSistemaModel extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = ['email', 'password', 'nombre', 'apellidos', 'pais', 'genero', 'fecha_nacimiento', 'image', 'id_plan'];


    function login($post)
    {

        $result = $this->select("*")->where("email", $post['email'])->get()->getResultArray();

        if (count($result) > 0) {
            if (password_verify($post['password'], $result[0]['password'])) {
                return $result[0];
            }
        }
        return false;
    }

    function register($post)
    {
        $datos = [
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'nombre' => $post['nombre'],
            'apellidos' => $post['apellidos']
        ];
        try {
            return $result = $this->insert($datos);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return false;
        }
    }


    function getUsuario($id)
    {
        $result = $this->select("*")->where("id_usuario", $id)->get()->getResultArray();
        if (count($result) > 0) {

            return $result[0];
        }
        return false;
    }


    function deleteImageProfile($id)
    {
        $result = $this->set("image", "NULL")->where("id_usuario", $id)->update();
        return $result;
    }

    function editUsuario($id, $data)
    {

        $this->set('nombre', $data['nombre']);
        $this->set('apellidos', $data['apellidos']);
        $this->set('email', $data['email']);

        if (isset($data['genero']) && !empty($data['genero'])) {
            $this->set('genero', $data['genero']);
        }
        if (isset($data['fecha_nacimiento']) && !empty($data['fecha_nacimiento'])) {
            $this->set('fecha_nacimiento', $data['fecha_nacimiento']);
        }
        if (isset($data['image']) && !empty($data['image'])) {
            $this->set('image', $data['image']);
        }
        try {
            return $this->where('id_usuario', $id)->update();
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return false;
        }
    }

    function editPasswordUsuario($id, $data)
    {
        try {
            $this->set('password', password_hash($data['newPass'], PASSWORD_DEFAULT));
            return $this->where('id_usuario', $id)->update();
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return false;
        }
    }

    function existeCorreo($email, $id)
    {
        $r = $this->select("*")->where("email", $email)->where("id_usuario <>", $id)->get()->getResultArray();
        return count($r) > 0;
    }

    function cambiarPlan($usuario, $id)
    {
        return $this->set("id_plan", $id)->where("id_usuario", $usuario)->update();
    }
}
