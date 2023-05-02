<?php

namespace App\Controllers;

use App\Models\FileModel;

class SearchCOntroller extends BaseController
{

    function searchHome()
    {
        $search = $this->request->getPost('search');

        if (strlen($search[0]) > 1) {
            $fileModel = new FileModel();

            $r = $fileModel->searchArchivos(session()->get("id_usuario"), $search[0]);
            http_response_code(200);

            echo json_encode($r);
        } else {
            $fileModel = new FileModel();
            $r = $fileModel->getArchivos(session()->get("id_usuario"));
            http_response_code(200);

            echo json_encode($r);
        }

        exit;
    }

    function searchFavoritos()
    {
        $search = $this->request->getPost('search');

        if (strlen($search[0]) > 1) {
            $fileModel = new FileModel();

            $r = $fileModel->searchArchivosFavoritos(session()->get("id_usuario"), $search[0]);
            http_response_code(200);

            echo json_encode($r);
        } else {
            $fileModel = new FileModel();
            $r = $fileModel->getArchivosFavoritos(session()->get("id_usuario"));
            http_response_code(200);

            echo json_encode($r);
        }

        exit;
    }

    function searchPapelera()
    {
        $search = $this->request->getPost('search');

        if (strlen($search[0]) > 1) {
            $fileModel = new FileModel();

            $r = $fileModel->searchArchivosPapelera(session()->get("id_usuario"), $search[0]);
            http_response_code(200);

            echo json_encode($r);
        } else {
            $fileModel = new FileModel();
            $r = $fileModel->getArchivosPapelera(session()->get("id_usuario"));
            http_response_code(200);

            echo json_encode($r);
        }

        exit;
    }
}
