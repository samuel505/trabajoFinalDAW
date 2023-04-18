<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table = "archivos";
    protected $primaryKey = "id_archivo";
    protected $allowedFields = ['id_usuario', 'filecode', 'ruta_local', 'nombre_archivo', 'fecha_subida', 'fecha_borrado', 'borrado'];


    function getArchivos($id)
    {
        $result = $this->select("*")->where("id_usuario", $id)->where("borrado", 0)->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return false;
    }

    function getArchivosPapelera($id)
    {
        $result = $this->select("*")->where("id_usuario", $id)->where("borrado", 1)->get()->getResultArray();

        if (count($result) > 0) {
            return $result;
        }
        return false;
    }

    function getOcupiedSize($id)
    {
        $result = $this->select('SUM(size) as totalSize')->where('id_usuario', $id)->get()->getResultArray();

        if (!is_null($result[0]['totalSize'])) {
            return $result[0]['totalSize'];
        }
        return false;
    }



    function getTotalSize($id)
    {
        $result = $this->query('SELECT almacenamiento FROM `planes` LEFT JOIN usuarios ON usuarios.id_plan = planes.id_plan WHERE id_usuario =' . $id)->getResultArray();

        if (count($result) > 0) {
            return $result[0];
        }
        return false;
    }

    //mejorar
    function uploadFile($archivo, $filecode, $type, $route, $name, $id)
    {
        //var_dump($archivo->getSize());die(); 

        $today = date('Y-m-d', strtotime('today'));

        $data = [

            'filecode'  => $filecode,
            'ruta_local'  =>  $route . $filecode . "." . $type,
            'id_usuario'  => session()->get('id_usuario'),
            'nombre_archivo'  => $name,
            'size'  => $archivo->getSize(),
            'type'  => $type,
            'fecha_subida'  => $today,
            'fecha_borrado'  => NULL,

        ];


        $idUsuario = $id;
        $ruta_local = $route . $filecode . "." . $type;
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
        return $this->set("borrado", 1)->where('filecode', $filecode)->where('id_usuario', $id)->where("borrado", 0)->update();
    }

    function recoverFile($filecode, $id)
    {

        return $this->set("borrado", 0)->where('filecode', $filecode)->where('id_usuario', $id)->update();
    }

    function permanentDelete($filecode, $id)
    {
        return  $result = $this->where('filecode', $filecode)->where('id_usuario', $id)->where("borrado", 1)->delete();
    }

    function permanentDeleteAll($id)
    {
        return  $result = $this->where('id_usuario', $id)->where("borrado", 1)->delete();
    }
}