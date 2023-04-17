<?php

namespace App\Controllers;

use App\Models\FileModel;

class TestController extends BaseController
{

    function TotalSizeUser()
    {
        $fileModel = new FileModel();
        $r = $fileModel->getOcupiedSize(1);
        var_dump(round($r['totalSize'],3)."GB");die();
    }

    function MaxSizeUser()
    {

        $fileModel = new FileModel();
        $r = $fileModel->getTotalSize(1);
        //var_dump(($r['almacenamiento']/1024/1024/1024));die();
      

    }


    function Post()
    {

        return $this->response->setJSON($_POST);

    }
}
