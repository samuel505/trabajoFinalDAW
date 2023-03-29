<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioSistemaModel extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    protected $allowedFields = ['email', 'password', 'name', 'apellidos'];


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
}
