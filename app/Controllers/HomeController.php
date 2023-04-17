<?php

namespace App\Controllers;

use App\Models\FileModel;

class HomeController extends BaseController
{
    public function index()
    {

        $data = [];
        $data['archivos'] = [];

        $fileModel = new FileModel();

        $result = $fileModel->getArchivos(session()->get("id_usuario"));
        if ($result !== false) {
            $data['archivos'] = $result;
        }

        $data['OccupiedSize'] = $this->getSize();

        $data['TotalSize'] = $this->getTotal();


        return view('home_view', $data);
    }

    function getAll()
    {
        $data = [];
        $data['archivos'] = [];

        $fileModel = new FileModel();

        $result = $fileModel->getArchivos(session()->get("id_usuario"));
        if ($result !== false) {
            $data['archivos'] = $result;
        }

        $data['OccupiedSize'] = $this->getSize();

        $data['TotalSize'] = $this->getTotal();


        echo json_encode($data);
        exit;
    }

    function getSize()
    {
        $fileModel = new fileModel();
        $result =  $fileModel->getOcupiedSize(session()->get('id_usuario'));
        $size = $result;

        if ($size !== false) {
            //var_dump($size);die();

            $size = $size / 1024 / 1024 / 1024;

            return round($size, 4);
        }
        return 0;
    }


    function getTotal()
    {
        $fileModel = new fileModel();
        $result =  $fileModel->getTotalSize(session()->get('id_usuario'));
        $size = $result['almacenamiento'];
        if ($size !== null) {

            $size = $size / 1024 / 1024 / 1024;
            //var_dump($size);die();
            return round($size, 4);
        }
        return 0;
    }
}
