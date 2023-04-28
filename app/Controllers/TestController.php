<?php

namespace App\Controllers;

use App\Models\FileModel;

class TestController extends BaseController
{

    function TotalSizeUser()
    {
        $fileModel = new FileModel();
        $r = $fileModel->getOcupiedSize(1);
        var_dump(round($r['totalSize'], 3) . "GB");
        die();
    }

    function MaxSizeUser()
    {

        $fileModel = new FileModel();
        $r = $fileModel->getTotalSize(1);
        //var_dump(($r['almacenamiento']/1024/1024/1024));die();


    }


    function index()
    {
        return view("test_view");
    }

    function testRecogida()
    {

        //lo que recibes de ajax pro POST
        $recogida = $_POST['datos'];


        // si no hay error (lo que querias hacer salió bien, Ejemplo: cambiar un dato desde el modelo)
        
        if (false) {
            http_response_code(200);
            echo json_encode(["hola"=>"adios"]);
            //header("location: /laquesea");
            exit;
        } else {
            // si hay error (lo que querias hacer salió mal)
            http_response_code(400);
            echo json_encode(["hola"=>"adios"]); //texto de error o array de errores que quieres mostrarle al usuario (se lo  envias a Ajax)
            exit;
        }


        // lo que le envias a ajax de respuesta (lo que recibe ajax)
        echo json_encode($recogida);
        exit;
    }
}
