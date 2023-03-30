<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\UploadFileModel;

class UploadFile extends BaseController
{

    public function subir()
    {
        $data = [];
        $homeModel = new HomeModel();
        $archivos = $this->request->getFiles('archivo')['archivo'];


        foreach ($archivos as $archivo) {

            $data['errores'] = $this->checkForm($archivo);


            if (count($data['errores']) == 0) {

                $filecode = uniqid();
                if ($archivo->isValid() && !$archivo->hasMoved()) {
                    $route = "uploads/";
                    $name = $archivo->getClientName();

                    $type = pathinfo($route . $name, PATHINFO_EXTENSION);

                    $archivo->move('uploads', $filecode . "." . $type);

                    $uploadFileModel = new UploadFileModel();

                    $result = $uploadFileModel->uploadFile($archivo, $filecode, $type, $route);

                    if (!$result) {
                        $data['errores'] = "No se pudo subir el archivo, motivo: desconocido";
                    }
                }
            }
        }

        if (count($data['errores']) == 0) {
            // enviar una respuesta HTTP 200 OK
            http_response_code(200);
            $data['archivos'] = $homeModel->getArchivos();
            echo json_encode($data['archivos']);
            // devolver la respuesta como un objeto JSON
            //echo json_encode(['status' => 'success', 'message' => 'La solicitud AJAX se procesó correctamente.']);

            // detener la ejecución del script

        } else {
            // enviar una respuesta HTTP 200 OK
            http_response_code(500);

            // devolver la respuesta como un objeto JSON
            echo json_encode(['status' => 'fail', 'message' => 'La solicitud AJAX no se procesó correctamente.']);

            // detener la ejecución del script

        }

        exit;
    }


    function checkForm($archivo)
    {
        $limite = 100485760; // 100 MB en bytes
        $errores = [];
        $homeModel = new HomeModel();
        $occupiedSize = $homeModel->getOcupiedSize(session()->get("id_usuario"));
        $totalSize = $homeModel->getTotalSize(session()->get("id_usuario"));


        if ($archivo->getSize() > $limite) {

            $errores['size'] = "No se pudo subir el archivo, motivo: El archivo seleccionado es demasiado grande. Por favor, seleccione un archivo de menos de 100 MB.";
        }

        /*
        if (($archivo['size'] + $occupiedSize) > $totalSize) {
         
            $errores['size'] = "No se pudo subir el archivo, motivo: No tienes espacio suficiente para subir el archivo";
        }
        */
        return $errores;
    }
}
