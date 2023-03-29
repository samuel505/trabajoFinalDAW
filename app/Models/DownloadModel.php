<?php

namespace App\Models;

use CodeIgniter\Model;

class DownloadModel extends Model
{
    protected $table = "archivos";
    protected $primaryKey = "id_archivo";
    protected $allowedFields = ["filecode,nombre_archivo"];

    function getFileName($filecode)
    {//var_dump($filecode);die();
        $result = $this->select("nombre_archivo")->where("filecode",$filecode)->get()->getResultArray();
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }
}
