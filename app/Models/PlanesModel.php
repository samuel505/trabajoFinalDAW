<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanesModel extends Model
{
    protected $table = "planes";
    protected $primaryKey = "id_'plan";
    protected $allowedFields = ['nombre_plan', 'almacenamiento', 'GB', 'precio'];


    function getPlanes()
    {

        return $this->select("*")->get()->getResultArray();
    }



}
