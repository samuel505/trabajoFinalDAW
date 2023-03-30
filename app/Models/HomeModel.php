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


    function getOcupiedSize($id)
    {
        $result = $this->selectSum('size')->where('id_usuario', $id)->get()->getResultArray();
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }



    function getTotalSize($id)
    {
        $result = $this->query('SELECT almacenamiento FROM `planes` LEFT JOIN usuarios ON usuarios.id_plan = planes.id_plan WHERE id_usuario ='.$id)->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return false;
    }
}
