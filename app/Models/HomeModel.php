<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = "archivos";
    protected $primaryKey = "id_archivo";
    protected $allowedFields = ['id_usuario', 'filecode', 'ruta_local', 'nombre_archivo', 'fecha_subida', 'fecha_borrado'];

    function getArchivos()
    {
        $result = $this->select("*")->where("id_usuario", session()->get("id_usuario"))->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return false;
    }
}
