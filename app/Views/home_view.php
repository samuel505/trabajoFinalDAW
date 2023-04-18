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
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/pdf/pdf.viewer.css">
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/PPTXjs/css/pptxjs.css">
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/PPTXjs/css/nv.d3.min.css">
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.css">
    <link rel="stylesheet" href="assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.css">
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
                        <div class="modal fade show" id="modalUploadFile" tabindex="-1" aria-labelledby="modalUploadFile" style="display: none;" aria-modal="true" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">Subiendo archivo</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="progress mb-3">
                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="barraDeCarga">25%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between welcome-content mb-3">
                            <h4>Archivos</h4>
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
                                                        <?php $url = base_url() . "file/" . $archivo["filecode"] . "." . $archivo["type"] ?>
                                                        <button class="dropdown-item" onclick="window.open('<?= $url ?>','_blank')">Descargar archivo</button>
                                                        <button class="dropdown-item" id="<?= $archivo['filecode'] ?>" title="<?= $url ?>" onclick="copiarEnlace(this)">Copiar enlace</button>
                                                        <button type="button" class="dropdown-item" onclick="deleteFile(this)">Borrar</button>
                                                    </div>
                                                </div>
                                            </div>
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
            let enlace = boton.title;
            navigator.clipboard.writeText(enlace)
                .then(function() {

                    alert('Enlace copiado al portapapeles');
                }, function() {
                    alert('Error al copiar el enlace');
                });
        }
    </script>
    <script>
        function deleteFile(boton) {

            let filecode = boton.previousElementSibling.id;

            $.ajax({
                type: "POST",
                url: '/deleteFile',
                dataType: 'json',
                data: {
                    "filecode": filecode
                },
                success: function(array) {

                    let URLactual = window.location.origin;

                    let string = "";
                    for (let i = 0; i < array.length; i++) {
                        let archivo = array[i];

                        let url = `${URLactual}/file/${archivo['filecode']}.${archivo['type']}`;
                        string += `<div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-block card-stretch card-height">
            <div class="card-body image-thumb">
                <div class="mb-4 text-center p-3 rounded iq-thumb">
                    <img src="../assets/images/archivo.png" class="img-fluid">
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
                               
                                <button class="dropdown-item" onclick="window.open('${url}','_blank')">Descargar archivo</button>
                                <button class="dropdown-item" id="${archivo['filecode']}" title="${url}" onclick="copiarEnlace(this)">Copiar enlace</button>
                                <button type="button" class="dropdown-item" onclick="deleteFile(this)">Borrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;

                    }
                    archivos.innerHTML = string;
                }
            }).fail(function(array) {
                let respuesta = array.responseText;
                alert(respuesta);
            });

        }
    </script>
    <!-- Wrapper End-->



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
                    <h4 class="modal-title">Titulo</h4>
                    <div>
                        <a class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="resolte-contaniner" style="height: 500px;" class="overflow-auto">
                        Archivo no escontrado
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>