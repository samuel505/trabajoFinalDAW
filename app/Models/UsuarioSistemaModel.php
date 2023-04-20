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

        return $result = $this->insert($datos);
    }


    function getUsuario($id)
    {
        $result = $this->select("*")->where("id_usuario", $id)->get()->getResultArray();
        if (count($result) > 0) {
            unset($result[0]['password']);
            return $result[0];
        }
        return false;
    }

    function editUsuario($id, $data)
    {

        $r = $this->table('usuarios');
        $r->set('nombre', $data['nombre']);
        $r->set('apellidos', $data['apellidos']);
        $r->set('email', $data['email']);
        
        if (isset($data['genero']) && !empty($data['genero'])) {
            $r->set('genero', $data['genero']);
        }
        if (isset($data['fecha_nacimiento']) && !empty($data['fecha_nacimiento'])) {
            $r->set('fecha_nacimiento', $data['fecha_nacimiento']);
        }
        if (isset($data['image']) && !empty($data['image'])) {
            $r->set('image', $data['image']);
        }
        return $r->where('id_usuario', $id)->update();
    }

    function FunctionName()
    {
    }
}
