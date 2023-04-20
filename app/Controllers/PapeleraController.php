<?php

namespace App\Controllers;

use App\Models\FileModel;
use App\Models\UsuarioSistemaModel;

class PapeleraController extends BaseController
{
    public function index()
    {

        $controller = new HomeController();
        $data = [];
        $data['archivos'] = [];

        $fileModel = new FileModel();
        $usuarioModel = new UsuarioSistemaModel();
        $result = $usuarioModel->getUsuario(session()->get("id_usuario"));
        $result2 = $fileModel->getArchivosPapelera(session()->get("id_usuario"));
        if ($result !== false) {

            $data['archivos'] = $result2;
        }

        $data['OccupiedSize'] = $controller->getSize();
        $data['usuario'] = $result;
        $data['TotalSize'] = $controller->getTotal();


        return view('trash_view', $data);
    }
}
