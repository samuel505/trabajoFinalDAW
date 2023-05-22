<?php

namespace App\Controllers;

use App\Models\FileModel;

class UploadFileController extends BaseController
{
    private const LIMIT = 209715200; // 200 MB en bytes

    public function getLimit()
    {
        echo json_encode(self::LIMIT);
        exit;
    }

    public function subir()
    {

        $data = [];
        $fileModel = new FileModel();
        $archivos = $this->request->getFiles('archivo')['archivo'];

        $home = new HomeController();

        foreach ($archivos as $archivo) {

            $data['errores'] = $this->checkForm($archivo);

            if (count($data['errores']) == 0) {

                $filecode = uniqid();

                if ($archivo->isValid() && !$archivo->hasMoved()) {
                    $route = "uploads/".session()->get("id_usuario")."/";
                    $name = $archivo->getClientName();

                    $type = pathinfo($route . $name, PATHINFO_EXTENSION);


                    $archivo->move('uploads/'.session()->get("id_usuario")."/", (isset($type) && !empty($type) ? ($filecode . "." . $type) : ($filecode)));

                    $uploadFileModel = new FileModel();

                    $result = $uploadFileModel->uploadFile($archivo, $filecode, $type, $route, $name, session()->get('id_usuario'));

                    if (!$result) {
                        $data['errores'] = "No se pudo subir el archivo";
                    }
                }
            }
        }


        if (count($data['errores']) == 0) {
            // enviar una respuesta HTTP 200 OK
            http_response_code(200);
            $data['archivos'] = $fileModel->getArchivos(session()->get("id_usuario"));
            $data['OccupiedSize'] = $home->getSize();
            $data['TotalSize'] = $home->getTotal();



            // devolver la respuesta como un objeto JSON
            echo json_encode($data);
        } else {
            // enviar una respuesta HTTP 400 
            http_response_code(400);

            // devolver la respuesta como un objeto JSON
            $archivos = $fileModel->getArchivos(session()->get("id_usuario"));

            // devolver la respuesta como un objeto JSON
            echo json_encode($data['errores']);
        }

        // detener la ejecución del script
        exit;
    }


    function checkForm($archivo)
    {
        $limite = self::LIMIT;
        $errores = [];
        $sizeArchivo = $archivo->getSize();

        if ($sizeArchivo > $limite) {

            $errores[] = "No se pudo subir el archivo, motivo: El archivo seleccionado es demasiado grande. Por favor, seleccione un archivo de menos de 200 MB.";
        }

        $espacioDisponible = $this->espacioDisponble2();
        if ($espacioDisponible < $sizeArchivo) {
            $errores[] = "No se pudo subir el archivo, motivo: No tienes espacio suficiente para subir el archivo";
        }

        if (strlen($archivo->getClientName()) > 999) {
            $errores[] = "No se pudo subir el archivo, motivo: El titulo del archivo es demasiado largo";
        }


        return $errores;
    }


    function existeArchivo($filecode)
    {
        $fileModel = new FileModel();
        $fileModel->getArchivos(session()->get('id_usuario'));
        return false;
    }

    function espacioDisponble()
    {
        $id = session()->get("id_usuario");
        $fileModel = new FileModel();
        $espacioDisponible = $fileModel->getTotalSize($id)['almacenamiento'] - $fileModel->getOcupiedSize($id);


        echo json_encode($espacioDisponible);
        exit;
    }

    function espacioDisponble2()
    {
        $id = session()->get("id_usuario");
        $fileModel = new FileModel();
        $espacioDisponible = $fileModel->getTotalSize($id)['almacenamiento'] - $fileModel->getOcupiedSize($id);

        return $espacioDisponible;
    }
}
