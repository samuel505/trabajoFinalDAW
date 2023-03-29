<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
    public function index()
    {

        $data = [];
        $data['archivos']=[];

        $homeModel = new HomeModel();

       $result = $homeModel->getArchivos();
        if ($result !== false) {
            $data['archivos'] = $result;
        }

       
        
        return view('home_view', $data);
    }
}
