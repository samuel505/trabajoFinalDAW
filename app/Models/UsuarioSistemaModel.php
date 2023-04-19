<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioSistemaModel extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = ['email', 'password', 'name', 'apellidos', 'pais', 'genero', 'fecha_nacimiento', 'image', 'id_plan'];


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
        $error = false;
        $r = $this->table('usuarios');
        $r->set('nombre', $data['nombre']);
        $r->set('apellidos', $data['apellidos']);
        $r->set('email', $data['email']);
        $r->set('genero', isset($data['genero']) ? $data['genero'] : NULL);
        $r->set('pais', isset($data['pais']) ? $data['pais'] : NULL);
        $r->set('fecha_nacimiento', isset($data['fecha_nacimiento']) ? $data['fecha_nacimiento'] : NULL);
        $r->set('image', isset($data['image']) ? $data['image'] : NULL);

return $data;
        return $r->where('id_usuario', $id)->update();
    }
}
