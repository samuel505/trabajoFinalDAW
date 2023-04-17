<?php

namespace App\Controllers;

use App\Models\FileModel;

class PapeleraController extends BaseController
{
    public function index()
    {

        $controller = new HomeController();
        $data = [];
        $data['archivos'] = [];

        $fileModel = new FileModel();

        $result = $fileModel->getArchivosPapelera(session()->get("id_usuario"));
        if ($result !== false) {
            
            $data['archivos'] = $result;
        }

        $data['OccupiedSize'] = $controller->getSize();

        $data['TotalSize'] = $controller->getTotal();


        return view('trash_view', $data);
    }
}
