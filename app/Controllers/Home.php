<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
    public function index()
    {

        $data = [];
        $data['archivos'] = [];

        $homeModel = new HomeModel();

        $result = $homeModel->getArchivos();
        if ($result !== false) {
            $data['archivos'] = $result;
        }

        $data['OccupiedSize'] = $this->getSize();
        $data['TotalSize']=$this->getTotal();
      

        
        return view('home_view', $data);
    }


    function getSize()
    {
        $homeModel = new HomeModel();
        $result =  $homeModel->getOcupiedSize(session()->get('id_usuario'));
        $size = $result[0]['size'];
    
        if ($size!==false) {
            return round($size / 1073741824,3);
        }
        return 0;
    }


    function getTotal()
    {
        $homeModel = new HomeModel();
        $result =  $homeModel->getTotalSize(session()->get('id_usuario'));
        $size = $result[0]['almacenamiento'];
        if ($size !== null) {
            return round($size / 1073741824,3);
        }
        return 0;
    }
}
