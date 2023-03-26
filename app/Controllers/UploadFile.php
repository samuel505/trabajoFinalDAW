<?php

namespace App\Controllers;

use App\Models\UploadFileModel;

class UploadFile extends BaseController
{

    public function subir()
    {
        $data = [];

        $archivos = $this->request->getFiles('archivo')['archivo'];

 
        foreach ($archivos as $archivo) {

            $data['errores'] = $this->checkForm($archivo);


            if (count($data['errores']) == 0) {
                
                $filecode = uniqid();
                if ($archivo->isValid() && !$archivo->hasMoved()) {
                    $route = "uploads/";
                    $name = $archivo->getClientName();

                    $type = pathinfo($route . $name, PATHINFO_EXTENSION);
                    
                    $archivo->move('uploads', $filecode. "." . $type);
                    
                    $uploadFileModel = new UploadFileModel();
                    
                    $result = $uploadFileModel->uploadFile($archivo, $filecode,$type,$route);
                    
                    if (!$result) {
                        $data['errores'] = "No se pudo subir el archivo, motivo: desconocido";
                    }
                }

               
            }
        }
        return view('home_view', $data);
    }


    function checkForm($archivo)
    {
        $limite = 100485760; // 100 MB en bytes
        $errores = [];

        if ($archivo->getSize() > $limite) {
            $errores['size'] = "No se pudo subir el archivo, motivo: El archivo seleccionado es demasiado grande. Por favor, seleccione un archivo de menos de 100 MB.";
        
        }

        if (false) {
        }

        return $errores;
    }
}
