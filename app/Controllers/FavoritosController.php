<?php

namespace App\Controllers;

use App\Models\FileModel;
use App\Models\UsuarioSistemaModel;

class FavoritosController extends BaseController
{
    public function index()
    {

        $controller = new HomeController();
        $data = [];
        $data['archivos'] = [];

        $fileModel = new FileModel();
        $usuarioModel = new UsuarioSistemaModel();
        $result = $usuarioModel->getUsuario(session()->get("id_usuario"));
        $result2 = $fileModel->getArchivosFavoritos(session()->get("id_usuario"));
        if ($result !== false) {

            $data['archivos'] = $result2;
        }

        $data['OccupiedSize'] = $controller->getSize();
        $data['usuario'] = $result;
        $data['TotalSize'] = $controller->getTotal();


        return view('favorites_view', $data);
    }

    function checkFavorite()
    {
        $data = [];
        $filecode = $this->request->getPost("filecode");
        $favoriteModel = new FileModel();
        $favorite = $this->request->getPost("favorite");
        


        if ($favorite == "true") {
            if ($favoriteModel->setFavorito($filecode, session()->get('id_usuario'))) {
                $data['archivos'] = $favoriteModel->getArchivosFavoritos(session()->get('id_usuario'));
                http_response_code(200);
                echo json_encode($data);
            } else {
                http_response_code(400);
                echo json_encode("error al añadir el archivo a favoritos");
            }
        } else {

            if ($favoriteModel->removeFavorito($filecode, session()->get('id_usuario'))) {
                $data['archivos'] = $favoriteModel->getArchivosFavoritos(session()->get('id_usuario'));
                http_response_code(200);
                echo json_encode($data);
            } else {
                http_response_code(400);
                echo json_encode("error al quitar el archivo de favoritos");
            }
        }
        exit;
    }
}
