<?php

namespace App\Controllers;

use App\Models\DownloadModel;

class DownloadController  extends BaseController
{


    public function downloadFile($filename)
    {
       
        $filepath = 'uploads/' . $filename;
        $filecode = filter_var(substr($filename, 0, strrpos($filename, ".")), FILTER_SANITIZE_STRING);
        $downloadFileModel = new DownloadModel();
        $result = $downloadFileModel->getFileName($filecode);

        if ($result !== false) {
            if (file_exists($filepath)) {
                header('Content-Type: application/octet-stream'); // Tipo de archivo a descargar
                header('Content-Disposition: attachment; filename=' . $result[0]['nombre_archivo']); // Nombre del archivo a descargar
                header('Content-Length: ' . filesize($filepath)); // Tamaño del archivo a descargar
                readfile($filepath); // Enviamos el archivo al navegador
                $this->response->setStatusCode(200);
                exit;
            }
        }else{
            $this->response->setStatusCode(404);
        }
    }
}