<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);    

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$uri = \Config\Services::uri();
$route = $uri->getPath();

if (!session()->has('id_usuario')) {

    if ($route != "login" && $route != "register") {
        header("location: /login");
        die();
    }

    $routes->get('/login', 'LoginController::index');
    $routes->post('/login', 'LoginController::login');
    $routes->get('/register', 'RegisterController::index');
    $routes->post('/register', 'RegisterController::register');
} else {
    $routes->get('/logout', 'LoginController::logout');
    $routes->get('/', 'HomeController::index');

    $routes->get('/papelera', 'PapeleraController::index');

    $routes->post('/verificarEspacioDisponible', 'UploadFileController::espacioDisponble');
    $routes->post('/verificarLimite', 'UploadFileController::getLimit');

    $routes->post('/uploadFile', 'UploadFileController::subir');
    $routes->get('file/(:any)', 'DownloadController::downloadFile/$1');

    $routes->post('deleteFile', 'DeleteFileController::borrar');
    $routes->post('recoverFile', 'DeleteFileController::restaurar');
    //$routes->post('recoverAllFile', 'DeleteFileController::restaurar');

    $routes->post('permanentDelete', 'DeleteFileController::borradoPermanente');
    $routes->post('permanentDeleteAll', 'DeleteFileController::borradoPermanenteAll');

    $routes->get('favoritos', 'FavoritosController::index');
    $routes->post('favorite', 'FavoritosController::checkFavorite');

    
    $routes->get('perfil', 'PerfilUsuarioController::index');
    $routes->get('planes', 'PlanesController::index');
    $routes->post('cambioPlan', 'PlanesController::cambioPlan');
    $routes->post('editUsuario', 'PerfilUsuarioController::editUsuario');
    $routes->post('editPasswordUsuario', 'PerfilUsuarioController::editPassword');

    //$routes->get('test', 'TestController::index');
    //$routes->post('testRecogida', 'TestController::testRecogida');
}



$routes->get('/testTotalSizeUser', 'TestController::TotalSizeUser');
$routes->get('/testMaxSizeUser', 'TestController::MaxSizeUser');

$routes->post('/testPost', 'TestController::Post');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
