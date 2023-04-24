<?php

namespace App\Controllers;

use App\Models\FileModel;
use App\Models\PlanesModel;
use App\Models\UsuarioSistemaModel;

class PlanesController extends BaseController
{
    public function index()
    {

        $controller = new HomeController();
        $data = [];
        $data['archivos'] = [];

        $fileModel = new FileModel();
        $usuarioModel = new UsuarioSistemaModel();
        $planesModel = new PlanesModel();
        $result = $usuarioModel->getUsuario(session()->get("id_usuario"));
        $result2 = $fileModel->getArchivosPapelera(session()->get("id_usuario"));
        $result3 = $planesModel->getPlanes();
        if ($result !== false) {
            $data['archivos'] = $result2;
        }

        $data['OccupiedSize'] = $controller->getSize();
        $data['usuario'] = $result;
        $data['TotalSize'] = $controller->getTotal();
        $data['planes'] = $result3;

        return view("planes_view", $data);
    }

    function cambioPlan()
    {
        $data = [];
        $id = $this->request->getPost('plan');

      


        $usuarioModel = new UsuarioSistemaModel();
        $u = $usuarioModel->getUsuario(session()->get('id_usuario'));
        $r =  $usuarioModel->cambiarPlan(session()->get('id_usuario'), $id);

        $data['old'] = $u['id_plan'];
        $data['new'] = $r;
        echo json_encode($data);
        exit;
    }
}
