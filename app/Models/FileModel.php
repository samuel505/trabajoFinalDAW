<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table = "archivos";
    protected $primaryKey = "id_archivo";
    protected $allowedFields = ['id_usuario', 'filecode', 'ruta_local', 'nombre_archivo', 'fecha_subida', 'fecha_borrado', 'borrado', 'favorito'];


    function getArchivos($id)
    {
        $result = $this->select("*")->where("id_usuario", $id)->where("borrado", 0)->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return [];
    }

    function getArchivosPapelera($id)
    {
        $result = $this->select("*")->where("id_usuario", $id)->where("borrado", 1)->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return [];
    }


    function getArchivosFavoritos($id)
    {
        $result = $this->select("*")->where("id_usuario", $id)->where("favorito", 1)->where("borrado", 0)->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return [];
    }





    function searchArchivos($id, $search)
    {
        $result = $this->select("*")->where("id_usuario", $id)->where("borrado", 0)->like("nombre_archivo", $search)->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return [];
    }

    function searchArchivosPapelera($id, $search)
    {
        $result = $this->select("*")->where("id_usuario", $id)->where("borrado", 1)->like("nombre_archivo", $search)->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return [];
    }


    function searchArchivosFavoritos($id, $search)
    {
        $result = $this->select("*")->where("id_usuario", $id)->where("favorito", 1)->where("borrado", 0)->like("nombre_archivo", $search)->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return [];
    }





    function setFavorito($filecode, $id)
    {
        return $this->set("favorito", 1)->where('filecode', $filecode)->where('id_usuario', $id)->update();
    }

    function removeFavorito($filecode, $id)
    {
        return $this->set("favorito", 0)->where('filecode', $filecode)->where('id_usuario', $id)->update();
    }


    function getOcupiedSize($id)
    {
        $result = $this->select('SUM(size) as totalSize')->where('id_usuario', $id)->get()->getResultArray();

        if (!is_null($result[0]['totalSize'])) {
            return $result[0]['totalSize'];
        }
        return 0;
    }



    function getTotalSize($id)
    {
        $result = $this->query('SELECT almacenamiento FROM `planes` LEFT JOIN usuarios ON usuarios.id_plan = planes.id_plan WHERE id_usuario =' . $id)->getResultArray();


        if (count($result) > 0) {
            return $result[0];
        }
        return [];
    }

    //mejorar
    function uploadFile($archivo, $filecode, $type, $route, $name, $id)
    {
        //var_dump($archivo->getSize());die(); 


        $today = date('Y-m-d', strtotime('today'));

        $idUsuario = $id;

        $ruta_local = $route . (isset($type) && !empty($type) ? ($filecode . "." . $type) : ($filecode));
        $nombreArchivo = $archivo->getClientName();
        $size = $archivo->getSize();


        $sql = "INSERT INTO `archivos`( `filecode`, `id_usuario`, `ruta_local`, `nombre_archivo`, `fecha_subida`, `fecha_borrado`, `type`, `size`) VALUES ('$filecode','$idUsuario','$ruta_local','$nombreArchivo','$today',NULL,'$type','$size')";
        return $this->query($sql);
    }



    function getFile($filecode)
    {
        $result = $this->select("*")->where("filecode", $filecode)->get()->getResultArray();
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }


    function existeArchivo($name)
    {
        $result = $this->select("*")->where("nombre_archivo", $name)->where("borrado", 0)->get()->getResultArray();
        if (count($result) > 0) {
            return true;
        }
        return false;
    }

    function deleteFile($filecode, $id)
    {
        try {
            return $this->set("borrado", 1)->set("fecha_borrado", date("Y-m-d"))->where('filecode', $filecode)->where('id_usuario', $id)->where("borrado", 0)->update();
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return false;
        }
    }

    function recoverFile($filecode, $id)
    {
        try {
            return $this->set("borrado", 0)->set("fecha_borrado", NULL)->where('filecode', $filecode)->where('id_usuario', $id)->update();
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return false;
        }
    }

    function permanentDelete($filecode, $id)
    {
        try {
            return  $result = $this->where('filecode', $filecode)->where('id_usuario', $id)->where("borrado", 1)->delete();
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return false;
        }
    }

    function permanentDeleteAll($id)
    {
        try {
            return  $result = $this->where('id_usuario', $id)->where("borrado", 1)->delete();
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return false;
        }
    }
}
