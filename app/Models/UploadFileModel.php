<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

use function PHPSTORM_META\type;

class UploadFileModel extends Model
{

    protected $table = "archivos";
    protected $primaryKey = "id_archivo";
    protected $allowedFields = ['id_usuario', 'filecode', 'ruta_local', 'nombre_archivo', 'fecha_subida', 'fecha_borrado'];

    function uploadFile($archivo, $filecode,$type,$route)
    {
       
        $today = date('Y-m-d', strtotime('today'));
        $data = [
            
            'filecode'  => $filecode,
            'ruta_local'  =>  $route.$filecode.".".$type,
            'id_usuario'  => session()->get('id_usuario'),
            'nombre_archivo'  => $archivo->getClientName(),
            'size'  => $archivo->getSize(),
            'type'  => $type,
            'fecha_subida'  => $today,
            'fecha_borrado'  => NULL,
            
        ];
        
        return $this->insert($data);
        
    }


    function getTotalSize()
    {
        $id_usuario = session()->get('id_usuario');
      return $this->select("size")->where('id_usuario', $id_usuario);

    }
}
