<!doctype html>
<html lang="en">

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
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/pdf/pdf.viewer.css">
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/PPTXjs/css/pptxjs.css">
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/PPTXjs/css/nv.d3.min.css">
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.css">
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class=" ">
    <div class="wrapper" id="drop_zone">
        <?php include "templates/left_navbar.php" ?>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="index.html" class="header-logo">
                            <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                        </a>
                    </div>
                    <div class="iq-search-bar device-search">
                        <form>

                            <div class="input-prepend input-append">
                                <div class="btn-group">

                                    <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                                        <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Type here to search..."><span class="search-replace"></span>
                                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                        <span class="caret"><!--icon--></span>
                                    </label>

                                    <ul class="dropdown-menu">
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-pdf bg-info"></i>PDFs</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-alt bg-primary"></i>Documents</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-excel bg-success"></i>Spreadsheet</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-powerpoint bg-danger"></i>Presentation</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-image bg-warning"></i>Photos &amp; Images</div>
                                            </a></li>
                                        <li><a href="#">
                                                <div class="item"><i class="far fa-file-video bg-info"></i>Videos</div>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon search-content">
                                    <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                        <form action="#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                                <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                                <a href="#" class="search-link"><i class="las la-search"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-question-line"></i>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton01">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="p-3">
                                                    <a href="#" class="iq-sub-card pt-0"><i class="ri-questionnaire-line"></i>Help</a>
                                                    <a href="#" class="iq-sub-card"><i class="ri-recycle-line"></i>Training</a>
                                                    <a href="#" class="iq-sub-card"><i class="ri-refresh-line"></i>Updates</a>
                                                    <a href="#" class="iq-sub-card"><i class="ri-service-line"></i>Terms and Policy</a>
                                                    <a href="#" class="iq-sub-card"><i class="ri-feedback-line"></i>Send Feedback</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="caption bg-primary line-height">P</div>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                                <div class="header-title">
                                                    <h4 class="card-title mb-0">Profile</h4>
                                                </div>
                                                <div class="close-data text-right badge badge-primary cursor-pointer "><i class="ri-close-fill"></i></div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-header">
                                                    <div class="cover-container text-center">
                                                        <div class="rounded-circle profile-icon bg-primary mx-auto d-block">
                                                            P
                                                            <a href=""></a>
                                                        </div>
                                                        <div class="profile-detail mt-3">
                                                            <h5><a href="">Usuario</a></h5>
                                                            <p>Usuario@gmail.com</p>
                                                        </div>
                                                        <a href="/logout" class="btn btn-primary">Cerrar sesion</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-between welcome-content mb-3">
                            <h4>Archivos</h4>
                        </div>
                    </div>
                </div>
                <div class="icon icon-grid i-grid">
                    <?php if (isset($errores)) { ?>
                        <?php if (empty($errores)) { ?>
                            <div class="alert alert-primary" role="alert">
                                <div class="iq-alert-text"><?php header("location: /") ?></div>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="iq-alert-text"> <?= $errores ?></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="row" id="archivos">
                        <?php foreach ($archivos as $archivo) { ?>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body image-thumb">
                                        <div class="mb-2 text-center p-3 rounded iq-thumb">
                                            <div class="iq-image-overlay "></div>
                                            <a href="#" data-title="<?php $archivo['filecode'] ?>" data-load-file="file" data-load-target="#resolte-contaniner" data-url="<?= base_url() . "/file/" . $archivo['filecode'] . "." . $archivo['type'] ?>" data-toggle="modal" data-target="#exampleModal"><img src="assets/images/layouts/page-7/pdf.png" class="img-fluid" alt="image1"></a>
                                        </div>
                                        <h6 class="text-center mb-2 font-weight-bold"><?= $archivo['nombre_archivo'] ?></h6>
                                        <div class="btn-group btn-group-toggle btn-group-flat">
                                            <a class="button btn button-icon bg-primary" target="_blank" href="<?= base_url() . "file/" . $archivo['filecode'] . "." . $archivo['type'] ?>">Descargar archivo</a>
                                            <button class="button btn button-icon bg-primary" id="<?php $archivo['filecode'] ?>" onclick="copiarEnlace(this)">Copiar enlace</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // por hacer: mostar un mensaje de copiado, hacer un contador y quitar el mensaje
        function copiarEnlace(boton) {
            let enlace = boton.previousElementSibling.href
            navigator.clipboard.writeText(enlace)
                .then(function() {

                    alert('Enlace copiado al portapapeles');
                }, function() {
                    alert('Error al copiar el enlace');
                });
        }
    </script>
    <!-- Wrapper End-->

    <script>
        /*
        EN PRUEBAS

        // Obtener la zona de caída y la barra de progreso
        var dropZone = document.getElementById('drop_zone');

        // Escuchar el evento "drop" en la zona de caída
        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();

            // Obtener el archivo arrastrado
            var file = e.dataTransfer.files[0];

            // Crear un objeto FormData y agregar el archivo
            var formData = new FormData();
            formData.append('archivo', file);

            // Crear una solicitud AJAX para subir el archivo
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'subir-archivo.php');

            // Escuchar el evento "progress" para actualizar la barra de progreso
            xhr.upload.addEventListener('progress', function(e) {
                var percent = (e.loaded / e.total) * 100;
                // progressBar.value = percent;
            });

            // Enviar la solicitud con el objeto FormData
            xhr.send(formData);
        });

        */
    </script>

    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>©
                    </span> <a href="#" class="">CloudBOX</a>.
                </div>
            </div>
        </div>
    </footer>
    <!-- Backend Bundle JavaScript -->
    <script src="assets/js/backend-bundle.min.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="assets/js/customizer.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="assets/js/chart-custom.js"></script>

    <!--PDF-->
    <script src="assets/vendor/doc-viewer/include/pdf/pdf.js"></script>
    <!--Docs-->
    <script src="assets/vendor/doc-viewer/include/docx/jszip-utils.js"></script>
    <script src="assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js"></script>
    <!--PPTX-->
    <script src="assets/vendor/doc-viewer/include/PPTXjs/js/filereader.js"></script>
    <script src="assets/vendor/doc-viewer/include/PPTXjs/js/d3.min.js"></script>
    <script src="assets/vendor/doc-viewer/include/PPTXjs/js/nv.d3.min.js"></script>
    <script src="assets/vendor/doc-viewer/include/PPTXjs/js/pptxjs.js"></script>
    <script src="assets/vendor/doc-viewer/include/PPTXjs/js/divs2slides.js"></script>
    <!--All Spreadsheet -->
    <script src="assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.js"></script>
    <script src="assets/vendor/doc-viewer/include/SheetJS/xlsx.full.min.js"></script>
    <!--Image viewer-->
    <script src="assets/vendor/doc-viewer/include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js"></script>
    <!--officeToHtml-->
    <script src="assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
    <script src="assets/js/doc-viewer.js"></script>
    <!-- app JavaScript -->
    <script src="assets/js/app.js"></script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Title</h4>
                    <div>
                        <a class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="resolte-contaniner" style="height: 500px;" class="overflow-auto">
                        File not found
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>