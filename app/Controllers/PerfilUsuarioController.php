<?php

namespace App\Controllers;


class PerfilUsuarioCOntroller  extends BaseController
{
    function index()
    {
        $data = [];

        return view('userProfile_view', $data);
    }
}
