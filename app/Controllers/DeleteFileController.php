<?php

namespace App\Controllers;

use App\Models\FileModel;

class DeleteFileController extends BaseController
{
    public function borrar()
    {

        $fileModel = new FileModel();

        $filecode = $this->request->getPost('filecode');
        $file = $fileModel->getFile($filecode);

   


        $route = (isset($file[0]["type"]) && !empty($file[0]["type"]) ? ($file[0]["filecode"] . "." . $file[0]["type"]) : ($file[0]["filecode"]));
        rename($file[0]['ruta_local'], "trash/" . $route);

        $result =  $fileModel->deleteFile($filecode, session()->get('id_usuario'));

        if ($result) {
            // enviar una respuesta HTTP 200 OK
            http_response_code(200);
            $archivos = $fileModel->getArchivos(session()->get("id_usuario"));

            // devolver la respuesta como un objeto JSON
            echo json_encode($archivos);
        } else {
            // enviar una respuesta HTTP 400 
            http_response_code(400);

            // devolver la respuesta como un objeto JSON
            echo json_encode('no se pudo borrar');
        }
        exit;
    }

    public function restaurar()
    {

        $fileModel = new FileModel();

        $filecode = $this->request->getPost('filecode');
        $file = $fileModel->getFile($filecode);
        $route = (isset($file[0]["type"]) && !empty($file[0]["type"]) ? ($file[0]["filecode"] . "." . $file[0]["type"]) : ($file[0]["filecode"]));


        rename("trash/" . $route, $file[0]['ruta_local']);

        $result =  $fileModel->recoverFile($filecode, session()->get('id_usuario'));

        if ($result) {
            // enviar una respuesta HTTP 200 OK
            http_response_code(200);
            $data['archivos'] = $fileModel->getArchivosPapelera(session()->get("id_usuario"));
            //$data['OccupiedSize'] = $home->getSize();
            //$data['TotalSize'] = $home->getTotal();

            // devolver la respuesta como un objeto JSON
            echo json_encode($data);
        } else {
            // enviar una respuesta HTTP 400 
            http_response_code(400);

            // devolver la respuesta como un objeto JSON
            echo json_encode('no se pudo borrar');
        }
        exit;
    }


    public function borradoPermanente()
    {
        $filecode = $this->request->getPost('filecode');

        $fileModel = new FileModel();

        $home = new HomeController();

        $file = $fileModel->getFile($filecode);

        $type = $file[0]['type'];

        $route = (isset($file[0]["type"]) && !empty($file[0]["type"]) ? ($file[0]["filecode"] . "." . $file[0]["type"]) : ($file[0]["filecode"]));

        $result2 = unlink("trash/" . $route);
        $result = $fileModel->permanentDelete($filecode, session()->get('id_usuario'));

        if ($result !== false && $result2) {
            // enviar una respuesta HTTP 200 OK
            http_response_code(200);
            $data['archivos'] = $fileModel->getArchivosPapelera(session()->get("id_usuario"));
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
            echo json_encode("no se a podido borrar el archivo");
        }

        // detener la ejecución del script
        exit;
    }


    public function borradoPermanenteAll()
    {
        $filecode = $this->request->getPost('filecode');

        $fileModel = new FileModel();
        $home = new HomeController();
        $result = $fileModel->permanentDeleteAll(session()->get('id_usuario'));

        $files = glob('trash/*'); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        $files = glob('trash/*');

        if ($result !== false && count($files) == 0) {
            // enviar una respuesta HTTP 200 OK
            http_response_code(200);

            $data['archivos'] = $fileModel->getArchivosPapelera(session()->get("id_usuario"));
            $data['OccupiedSize'] = $home->getSize();
            $data['TotalSize'] = $home->getTotal();
            // devolver la respuesta como un objeto JSON
            echo json_encode($data);
        } else {
            // enviar una respuesta HTTP 400 
            http_response_code(400);

            // devolver la respuesta como un objeto JSON
            echo json_encode("no se a podido borrar el archivo");
        }

        // detener la ejecución del script
        exit;
    }
}
