<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FileHub</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="assets/css/backend.css?v=1.0.0">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/fonts/remixicon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class=" ">
    <div class="wrapper" id="drop_zone">
        <?php include "templates/leftNavbar_view.php" ?>
        <?php include "templates/topNavbar_view.php" ?>
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert text-white bg-danger" role="alert" style="display:none;" id="error">
                            <div class="text-center text-uppercase iq-alert-text"></div>
                        </div>
                        <div class="alert text-white bg-success" role="alert" style="display:none;" id="success">
                            <div class="text-center text-uppercase iq-alert-text"></div>
                        </div>
                        <div class="card card-block card-stretch  card-transparent">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <div class="header-title">
                                    <h4 class="card-title">Papelera</h4>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="mr-4">
                                        <button class="btn btn-primary " onclick="mostrarModalConfirmacion2()">Vaciar papelera</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icon icon-grid i-grid">
                    <?php if (isset($errores)) { ?>
                        <?php if (empty($errores)) { ?>
                            <div class="alert alert-primary" role="alert">
                                <div class="iq-alert-text">No se pudo subir el archivo</div>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="iq-alert-text"> <?= $errores ?></div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <div class="row" id="archivos">
                        <?php if (isset($archivos) && count($archivos) > 0) { ?>
                            <?php foreach ($archivos as $key => $archivo) { ?>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-block card-stretch card-height">
                                        <div class="card-body image-thumb">
                                            <div class="mb-4 text-center p-3 rounded iq-thumb">
                                                <img src="../assets/images/archivo.png" class="img-fluid">
                                                <div class="iq-image-overlay"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h6><?= $archivo['nombre_archivo'] ?></h6>
                                                <div class="card-header-toolbar">
                                                    <div class="dropdown">
                                                        <span class="dropdown-toggle" id="dropdownMenuButton003" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </span>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton003" style>
                                                            <span hidden class="deleted"><?= $archivo['filecode'] ?></span>
                                                            <button class="dropdown-item" onclick="recoverFile(this)"><i class="ri-restart-line mr-2"></i>Restaurar</button>
                                                            <button class="dropdown-item" onclick="mostrarModalConfirmacion()" id="borrar"><i class="ri-delete-bin-6-fill mr-2"></i>Borrado permanente</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">¿Seguro de querer borrar permanentemente este archivo?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Una vez borrado no se podrá recuperar.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="permanentDelete()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmModal2" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel2">¿Estas seguro de querer vaciar la papelera?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Una vez vaciada la papelera, no se podran recuperar los archivos.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="permanentDeleteAll()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function mostrarModalConfirmacion() {
            $('#confirmModal').modal('show');
        }

        function mostrarModalConfirmacion2() {
            $('#confirmModal2').modal('show');
        }

        function recoverFile(boton) {

            let filecode = boton.previousElementSibling.innerHTML;
            let modalError = document.getElementById("error");
            let success = document.getElementById("success");
            $.ajax({
                type: "POST",
                url: '/recoverFile',
                dataType: 'json',
                data: {
                    "filecode": filecode
                },
                success: function(array) {
                    array1 = array['archivos'];

                    let URLactual = window.location.origin;

                    let string = "";
                    if (typeof(array1) !== 'undefined') {

                        for (let i = 0; i < array1.length; i++) {
                            let archivo = array1[i];

                            string += `<div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body image-thumb">
                                        <div class="mb-4 text-center p-3 rounded iq-thumb">
                                            <img src="../assets/images/archivo.png" class="img-fluid" >
                                            <div class="iq-image-overlay"></div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>${archivo['nombre_archivo']}</h6>
                                            <div class="card-header-toolbar">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton003" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-2-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton003" style>
                                                        <span hidden class="deleted">${archivo['filecode']}</span>
                                                        <button class="dropdown-item" onclick="recoverFile(this)"><i class="ri-restart-line mr-2"></i>Restaurar</button>
                                                        <button class="dropdown-item" onclick="mostrarModalConfirmacion()" id="borrar"><i class="ri-delete-bin-6-fill mr-2" ></i>Borrado permanente</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`

                        }
                    }

                    archivos.innerHTML = string;
                }
            }).fail(function(array) {
                let modalError = document.getElementById("error");
                let modalsuccess = document.getElementById("success");
                let response = JSON.parse(array.responseText);
                modalsuccess.style.display = "none";
                modalError.style.display = "block";
                console.log(response);
                modalError.firstChild.nodeValue = response;
                setTimeout(() => {
                    modalError.style.display = "none"
                }, 3000);
            });

        }


        function permanentDelete() {
            let boton = document.getElementById("borrar");
            $('#confirmModal').modal('hide');
            let filecode = boton.previousElementSibling.previousElementSibling.innerHTML;

            $.ajax({
                type: "POST",
                url: '/permanentDelete',
                dataType: 'json',
                data: {
                    "filecode": filecode
                },
                success: function(array) {

                    array1 = array['archivos'];
                    let URLactual = window.location.origin;
                    let modalError = document.getElementById("error");
                    let success = document.getElementById("success");
                    let string = "";
                    if (typeof(array1) !== 'undefined') {

                        for (let i = 0; i < array1.length; i++) {
                            let archivo = array1[i];

                            string += `<div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body image-thumb">
                                        <div class="mb-4 text-center p-3 rounded iq-thumb">
                                            <img src="../assets/images/archivo.png" class="img-fluid" >
                                            <div class="iq-image-overlay"></div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>${archivo['nombre_archivo']}</h6>
                                            <div class="card-header-toolbar">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton003" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-2-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton003" style>
                                                        <span hidden class="deleted">${archivo['filecode']}</span>
                                                        <button class="dropdown-item" onclick="recoverFile(this)"><i class="ri-restart-line mr-2"></i>Restaurar</button>
                                                        <button class="dropdown-item" onclick="mostrarModalConfirmacion()" id="borrar"><i class="ri-delete-bin-6-fill mr-2" ></i>Borrado permanente</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                        }
                    }

                    let n1 = (100 - ((array['TotalSize'] - array['OccupiedSize']) / array['TotalSize']) * 100).toFixed(3);

                    let n2 = (array['TotalSize'] - array['OccupiedSize']).toFixed(3);
                    lMenu = '<h4 class="mb-3"><i class="las la-cloud mr-2"></i>Almacenamiento</h4> <p>' + array['OccupiedSize'].toFixed(3) + '/' + array['TotalSize'] + 'GB Usado</p> <div class="iq-progress-bar mb-3"> <span class="bg-primary iq-progress progress-1" style="width: ' + n1 + '%"> </span> </div> <p> ' + n1 + '% Full - ' + n2 + ' GB Free</p> <a href="#" class="btn btn-outline-primary view-more mt-4">Ampliar espacio</a> </div> <div class="p-3"></div> </div> </div>';
                    leftMenu = document.getElementById('leftMenu');
                    archivos = document.getElementById('archivos');
                    archivos.innerHTML = string;

                    leftMenu.innerHTML = lMenu;
                }
            }).fail(function(array) {
                let response = JSON.parse(array.responseText);
                let modalError = document.getElementById("error");
                let modalsuccess = document.getElementById("success");
                modalsuccess.style.display = "none";
                modalError.style.display = "block";
                modalError.firstChild.nodeValue = response;
                setTimeout(() => {
                    modalError.style.display = "none"
                }, 3000);
            });


        }


        function permanentDeleteAll() {
            let modalError = document.getElementById("error");
            let success = document.getElementById("success");
            $('#confirmModal2').modal('hide');

            $.ajax({
                type: "POST",
                url: '/permanentDeleteAll',
                dataType: 'json',

                success: function(array) {

                    array1 = array['archivos'];
                    let n1 = (100 - ((array['TotalSize'] - array['OccupiedSize']) / array['TotalSize']) * 100).toFixed(3);
                    let n2 = (array['TotalSize'] - array['OccupiedSize']).toFixed(3);

                    lMenu = '<h4 class="mb-3"><i class="las la-cloud mr-2"></i>Almacenamiento</h4> <p>' + array['OccupiedSize'].toFixed(3) + '/' + array['TotalSize'] + 'GB Usado</p> <div class="iq-progress-bar mb-3"> <span class="bg-primary iq-progress progress-1" style="width: ' + n1 + '%"> </span> </div> <p> ' + n1 + '% Full - ' + n2 + ' GB Free</p> <a href="#" class="btn btn-outline-primary view-more mt-4">Ampliar espacio</a> </div> <div class="p-3"></div> </div> </div>';
                    leftMenu = document.getElementById('leftMenu');
                    archivos = document.getElementById('archivos');

                    archivos.innerHTML = "";
                    leftMenu.innerHTML = lMenu;

                }
            }).fail(function(array) {
                let response = JSON.parse(array.responseText);
                let modalError = document.getElementById("error");
                let modalsuccess = document.getElementById("success");
                successModal.style.display = "none";
                modalError.style.display = "block";
                modalError.firstChild.nodeValue = response;
                setTimeout(() => {
                    modalError.style.display = "none"
                }, 3000);
            });


        }
    </script>
    <script>
        function search(name) {
            $.ajax({
                type: "POST",
                url: '/searchPapelera',
                dataType: 'json',
                data: {
                    "search": [name]
                },
                success: function(array) {

                    let URLactual = window.location.origin;

                    let string = "";
                    for (let i = 0; i < array.length; i++) {
                        let archivo = array[i];

                        let url = URLactual + "/file/" + (archivo['type'].length != 0 ? (archivo['filecode'] + "." + archivo['type']) : archivo['filecode']);

                        string += `<div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body image-thumb">
                                        <div class="mb-4 text-center p-3 rounded iq-thumb">
                                            <img src="../assets/images/archivo.png" class="img-fluid" >
                                            <div class="iq-image-overlay"></div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h6>${archivo['nombre_archivo']}</h6>
                                            <div class="card-header-toolbar">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton003" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-2-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton003" style>
                                                        <span hidden class="deleted">${archivo['filecode']}</span>
                                                        <button class="dropdown-item" onclick="recoverFile(this)"><i class="ri-restart-line mr-2"></i>Restaurar</button>
                                                        <button class="dropdown-item" onclick="mostrarModalConfirmacion()" id="borrar"><i class="ri-delete-bin-6-fill mr-2" ></i>Borrado permanente</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                    }
                    archivos.innerHTML = string;
                },

            });
        }
    </script>
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Politica de privacidad</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terminos de uso</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>©
                    </span> <a href="#" class="">FileHub</a>.
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/backend-bundle.min.js"></script>
    <script src="assets/js/customizer.js"></script>
    <script src="assets/js/chart-custom.js"></script>>
    <script src="assets/js/app.js"></script>
</body>

</html>