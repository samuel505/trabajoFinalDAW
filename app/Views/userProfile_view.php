<!DOCTYPE html>
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
<body>
    <div class="wrapper">
        <?php //include "templates/leftNavbar_view.php" ?>
        <?php include "templates/topNavbar_view.php" ?>
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="iq-edit-list usr-edit">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">Información Personal</a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">Cambiar Contraseña</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Información Personal</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                            <div class="crm-profile-img-edit">
                                                                <img class="crm-profile-pic rounded-circle avatar-100" src="../assets/images/user/11.png" alt="profile-pic">
                                                                <div class="crm-p-image bg-primary">
                                                                    <i class="las la-pen upload-button"></i>
                                                                    <input class="file-upload" type="file" accept="image/*">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname">Nombre</label>
                                                        <input type="text" class="form-control" id="fname" value="Barry">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="lname">Apellidos</label>
                                                        <input type="text" class="form-control" id="lname" value="Tech">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Correo Electronico</label>
                                                        <input type="text" class="form-control" id="email" value="Barry@01">
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="d-block">Genero:</label>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="hombre" name="genero" class="custom-control-input" checked="">
                                                            <label class="custom-control-label" for="hombre">Hombre</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="mujer" name="genero" class="custom-control-input">
                                                            <label class="custom-control-label" for="mujer">Mujer</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="fecha">Fecha de nacimiento</label>
                                                        <input class="form-control" id="fecha" value="" type="date">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="paises">Pais</label>
                                                        <select class="form-control" id="paises">

                                                        </select>
                                                        <script>
                                                            const select = document.getElementById("paises");
                                                            const url = "https://restcountries.com/v2/all?lang=es";
                                                            fetch(url)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    data.forEach(country => {
                                                                        const option = document.createElement("option");
                                                                        option.text = country.translations.es || country.name;
                                                                        option.value = country.alpha2Code;
                                                                        select.add(option);
                                                                    });
                                                                })
                                                                .catch(error => console.log(error));
                                                        </script>
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label>Dirección</label>
                                                        <textarea class="form-control" name="address" rows="5" style="line-height: 22px;">                                       37 Cardinal Lane
                                       Petersburg, VA 23803
                                       United States of America
                                       Zip Code: 85001
                                       </textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                                                <button type="reset" class="btn iq-bg-danger">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Cambiar Contraseña</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="pass">Contraseña actual</label>

                                                    <input type="Password" class="form-control" id="pass" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="newPass">Nueva Contraseña</label>
                                                    <input type="Password" class="form-control" id="newPass" value="" name="newPass">
                                                </div>
                                                <div class="form-group">
                                                    <label for="newPass2">Confirma Contraseña</label>
                                                    <input type="Password" class="form-control" id="newPass2" value="">
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Cambiar</button>
                                                <button type="reset" class="btn iq-bg-danger">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper End-->

    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>

    <!--PDF-->
    <script src="../assets/vendor/doc-viewer/include/pdf/pdf.js"></script>
    <!--Docs-->
    <script src="../assets/vendor/doc-viewer/include/docx/jszip-utils.js"></script>
    <script src="../assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js"></script>
    <!--PPTX-->
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/filereader.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/d3.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/nv.d3.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/pptxjs.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/divs2slides.js"></script>
    <!--All Spreadsheet -->
    <script src="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/SheetJS/xlsx.full.min.js"></script>
    <!--Image viewer-->
    <script src="../assets/vendor/doc-viewer/include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js"></script>
    <!--officeToHtml-->
    <script src="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
    <script src="../assets/js/doc-viewer.js"></script>
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Title</h4>
                    <div>
                        <a class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
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



    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
    <div id="toolbarContainer">
        <div id="debug-icon" class="debug-bar-ndisplay" style="display: inline-block;">
            <a id="debug-icon-link" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 155 200">
                    <defs></defs>
                    <path fill="#dd4814" d="M73.7 3.7c2.2 7.9-.7 18.5-7.8 29-1.8 2.6-10.7 12.2-19.7 21.3-23.9 24-33.6 37.1-40.3 54.4-7.9 20.6-7.8 40.8.5 58.2C12.8 180 27.6 193 42.5 198l6 2-3-2.2c-21-15.2-22.9-38.7-4.8-58.8 2.5-2.7 4.8-5 5.1-5 .4 0 .7 2.7.7 6.1 0 5.7.2 6.2 3.7 9.5 3 2.7 4.6 3.4 7.8 3.4 5.6 0 9.9-2.4 11.6-6.5 2.9-6.9 1.6-12-5-20.5-10.5-13.4-11.7-23.3-4.3-34.7l3.1-4.8.7 4.7c1.3 8.2 5.8 12.9 25 25.8 20.9 14.1 30.6 26.1 32.8 40.5 1.1 7.2-.1 16.1-3.1 21.8-2.7 5.3-11.2 14.3-16.5 17.4-2.4 1.4-4.3 2.6-4.3 2.8 0 .2 2.4-.4 5.3-1.4 24.1-8.3 42.7-27.1 48.2-48.6 1.9-7.6 1.9-20.2-.1-28.5-3.5-15.2-14.6-30.5-29.9-41.2l-7-4.9-.6 3.3c-.8 4.8-2.6 7.6-5.9 9.3-4.5 2.3-10.3 1.9-13.8-1-6.7-5.7-7.8-14.6-3.7-30.5 3-11.6 3.2-20.6.5-29.1C88.3 18 80.6 6.3 74.8 2.2 73.1.9 73 1 73.7 3.7z"></path>
                </svg>
            </a>
        </div>
        <div id="debug-bar" style="display: none;">
            <div class="toolbar">
                <span id="toolbar-position"><a href="javascript: void(0)">↕</a></span>
                <span id="toolbar-theme"><a href="javascript: void(0)">🔅</a></span>
                <span class="ci-label">
                    <a href="javascript: void(0)" data-tab="ci-timeline">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAD7SURBVEhLY6ArSEtLK09NTbWHcvGC9PR0BaDaQiAdUl9fzwQVxg+AFvwHamqHcnGCpKQkeaDa9yD1UD09UCn8AKaBWJySkmIApFehi0ONwwRQBceBLurAh4FqFoHUAtkrgPgREN+ByYEw1DhMANVEMIhAYQ5U1wtU/wmILwLZRlAp/IBYC8gGw88CaFj3A/FnIL4ETDXGUCnyANSC/UC6HIpnQMXAqQXIvo0khxNDjcMEQEmU9AzDuNI7Lgw1DhOAJIEuhQcRKMcC+e+QNHdDpcgD6BaAANSSQqBcENFlDi6AzQKqgkFlwWhxjVI8o2OgmkFaXI8CTMDAAAAxd1O4FzLMaAAAAABJRU5ErkJggg==">
                        <span class="hide-sm">87.4 ms &nbsp; 1.685 MB</span>
                    </a>
                </span>

                <span class="ci-label">
                    <a href="javascript: void(0)" data-tab="ci-logs">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACYSURBVEhLYxgFJIHU1FSjtLS0i0D8AYj7gEKMEBkqAaAFF4D4ERCvAFrwH4gDoFIMKSkpFkB+OTEYqgUTACXfA/GqjIwMQyD9H2hRHlQKJFcBEiMGQ7VgAqCBvUgK32dmZspCpagGGNPT0/1BLqeF4bQHQJePpiIwhmrBBEADR1MRfgB0+WgqAmOoFkwANHA0FY0CUgEDAwCQ0PUpNB3kqwAAAABJRU5ErkJggg==">
                        <span class="hide-sm">
                            Logs </span>
                    </a>
                </span>
                <span class="ci-label">
                    <a href="javascript: void(0)" data-tab="ci-views">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADeSURBVEhL7ZSxDcIwEEWNYA0YgGmgyAaJLTcUaaBzQQEVjMEabBQxAdw53zTHiThEovGTfnE/9rsoRUxhKLOmaa6Uh7X2+UvguLCzVxN1XW9x4EYHzik033Hp3X0LO+DaQG8MDQcuq6qao4qkHuMgQggLvkPLjqh00ZgFDBacMJYFkuwFlH1mshdkZ5JPJERA9JpI6xNCBESvibQ+IURA9JpI6xNCBESvibQ+IURA9DTsuHTOrVFFxixgB/eUFlU8uKJ0eDBFOu/9EvoeKnlJS2/08Tc8NOwQ8sIfMeYFjqKDjdU2sp4AAAAASUVORK5CYII=">
                        <span class="hide-sm">
                            Views <span class="badge">1</span>
                        </span>
                    </a>
                </span>
                <span class="ci-label">
                    <a href="javascript: void(0)" data-tab="ci-files">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGBSURBVEhL7ZQ9S8NQGIVTBQUncfMfCO4uLgoKbuKQOWg+OkXERRE1IAXrIHbVDrqIDuLiJgj+gro7S3dnpfq88b1FMTE3VZx64HBzzvvZWxKnj15QCcPwCD5HUfSWR+JtzgmtsUcQBEva5IIm9SwSu+95CAWbUuy67qBa32ByZEDpIaZYZSZMjjQuPcQUq8yEyYEb8FSerYeQVGbAFzJkX1PyQWLhgCz0BxTCekC1Wp0hsa6yokzhed4oje6Iz6rlJEkyIKfUEFtITVtQdAibn5rMyaYsMS+a5wTv8qeXMhcU16QZbKgl3hbs+L4/pnpdc87MElZgq10p5DxGdq8I7xrvUWUKvG3NbSK7ubngYzdJwSsF7TiOh9VOgfcEz1UayNe3JUPM1RWC5GXYgTfc75B4NBmXJnAtTfpABX0iPvEd9ezALwkplCFXcr9styiNOKc1RRZpaPM9tcqBwlWzGY1qPL9wjqRBgF5BH6j8HWh2S7MHlX8PrmbK+k/8PzjOOzx1D3i1pKTTAAAAAElFTkSuQmCC">
                        <span class="hide-sm">
                            Files <span class="badge">118</span>
                        </span>
                    </a>
                </span>
                <span class="ci-label">
                    <a href="javascript: void(0)" data-tab="ci-routes">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFDSURBVEhL7ZRNSsNQFIUjVXSiOFEcuQIHDpzpxC0IGYeE/BEInbWlCHEDLsSiuANdhKDjgm6ggtSJ+l25ldrmmTwIgtgDh/t37r1J+16cX0dRFMtpmu5pWAkrvYjjOB7AETzStBFW+inxu3KUJMmhludQpoflS1zXban4LYqiO224h6VLTHr8Z+z8EpIHFF9gG78nDVmW7UgTHKjsCyY98QP+pcq+g8Ku2s8G8X3f3/I8b038WZTp+bO38zxfFd+I6YY6sNUvFlSDk9CRhiAI1jX1I9Cfw7GG1UB8LAuwbU0ZwQnbRDeEN5qqBxZMLtE1ti9LtbREnMIuOXnyIf5rGIb7Wq8HmlZgwYBH7ORTcKH5E4mpjeGt9fBZcHE2GCQ3Vt7oTNPNg+FXLHnSsHkw/FR+Gg2bB8Ptzrst/v6C/wrH+QB+duli6MYJdQAAAABJRU5ErkJggg==">
                        <span class="hide-sm">
                            Routes <span class="badge">7</span>
                        </span>
                    </a>
                </span>
                <span class="ci-label">
                    <a href="javascript: void(0)" data-tab="ci-events">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEASURBVEhL7ZXNDcIwDIVTsRBH1uDQDdquUA6IM1xgCA6MwJUN2hk6AQzAz0vl0ETUxC5VT3zSU5w81/mRMGZysixbFEVR0jSKNt8geQU9aRpFmp/keX6AbjZ5oB74vsaN5lSzA4tLSjpBFxsjeSuRy4d2mDdQTWU7YLbXTNN05mKyovj5KL6B7q3hoy3KwdZxBlT+Ipz+jPHrBqOIynZgcZonoukb/0ckiTHqNvDXtXEAaygRbaB9FvUTjRUHsIYS0QaSp+Dw6wT4hiTmYHOcYZsdLQ2CbXa4ftuuYR4x9vYZgdb4vsFYUdmABMYeukK9/SUme3KMFQ77+Yfzh8eYF8+orDuDWU5LAAAAAElFTkSuQmCC">
                        <span class="hide-sm">
                            Events <span class="badge">1</span>
                        </span>
                    </a>
                </span>
                <span class="ci-label">
                    <a href="javascript: void(0)" data-tab="ci-history">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAJySURBVEhL3ZU7aJNhGIVTpV6i4qCIgkIHxcXLErS4FBwUFNwiCKGhuTYJGaIgnRoo4qRu6iCiiIuIXXTTIkIpuqoFwaGgonUQlC5KafU5ycmNP0lTdPLA4fu+8573/a4/f6hXpFKpwUwmc9fDfweKbk+n07fgEv33TLSbtt/hvwNFT1PsG/zdTE0Gp+GFfD6/2fbVIxqNrqPIRbjg4t/hY8aztcngfDabHXbKyiiXy2vcrcPH8oDCry2FKDrA+Ar6L01E/ypyXzXaARjDGGcoeNxSDZXE0dHRA5VRE5LJ5CFy5jzJuOX2wHRHRnjbklZ6isQ3tIctBaAd4vlK3jLtkOVWqABBXd47jGHLmjTmSScttQV5J+SjfcUweFQEbsjAas5aqoCLXutJl7vtQsAzpRowYqkBinyCC8Vicb2lOih8zoldd0F8RD7qTFiqAnGrAy8stUAvi/hbqDM+YzkAFrLPdR5ZqoLXsd+Bh5YCIH7JniVdquUWxOPxDfboHhrI5XJ7HHhiqQXox+APe/Qk64+gGYVCYZs8cMpSFQj9JOoFzVqqo7k4HIvFYpscCoAjOmLffUsNUGRaQUwDlmofUa34ecsdgXdcXo4wbakBgiUFafXJV8A4DJ/2UrxUKm3E95H8RbjLcgOJRGILhnmCP+FBy5XvwN2uIPcy1AJvWgqC4xm2aU4Xb3lF4I+Tpyf8hRe5w3J7YLymSeA8Z3nSclv4WLRyFdfOjzrUFX0klJUEtZtntCNc+F69cz/FiDzEPtjzmcUMOr83kDQEX6pAJxJfpL3OX22n01YN7SZCoQnaSdoZ+Jz+PZihH3wt/xlCoT9M6nEtmRSPCQAAAABJRU5ErkJggg==">
                        <span class="hide-sm">
                            History <span class="badge">20</span>
                        </span>
                    </a>
                </span>

                <span class="ci-label">
                    <a href="javascript: void(0)" data-tab="ci-vars">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACLSURBVEhLYxgFJIHU1NSraWlp/6H4T0pKSjRUijoAyXAwBlrYDpViAFpmARQrJwZDtWACoCROC4D8CnR5XBiqBRMADfyNprgRKkUdAApzoCUdUNwE5MtApYYIALp6NBWBMVQLJgAaOJqK8AOgq+mSio6DggjEBtLUT0UwQ5HZIADkj6aiUTAggIEBANAEDa/lkCRlAAAAAElFTkSuQmCC">
                        <span class="hide-sm">Vars</span>
                    </a>
                </span>

                <h1>
                    <span class="ci-label">
                        <a href="javascript: void(0)" data-tab="ci-config">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 155 200">
                                <defs></defs>
                                <path fill="#dd4814" d="M73.7 3.7c2.2 7.9-.7 18.5-7.8 29-1.8 2.6-10.7 12.2-19.7 21.3-23.9 24-33.6 37.1-40.3 54.4-7.9 20.6-7.8 40.8.5 58.2C12.8 180 27.6 193 42.5 198l6 2-3-2.2c-21-15.2-22.9-38.7-4.8-58.8 2.5-2.7 4.8-5 5.1-5 .4 0 .7 2.7.7 6.1 0 5.7.2 6.2 3.7 9.5 3 2.7 4.6 3.4 7.8 3.4 5.6 0 9.9-2.4 11.6-6.5 2.9-6.9 1.6-12-5-20.5-10.5-13.4-11.7-23.3-4.3-34.7l3.1-4.8.7 4.7c1.3 8.2 5.8 12.9 25 25.8 20.9 14.1 30.6 26.1 32.8 40.5 1.1 7.2-.1 16.1-3.1 21.8-2.7 5.3-11.2 14.3-16.5 17.4-2.4 1.4-4.3 2.6-4.3 2.8 0 .2 2.4-.4 5.3-1.4 24.1-8.3 42.7-27.1 48.2-48.6 1.9-7.6 1.9-20.2-.1-28.5-3.5-15.2-14.6-30.5-29.9-41.2l-7-4.9-.6 3.3c-.8 4.8-2.6 7.6-5.9 9.3-4.5 2.3-10.3 1.9-13.8-1-6.7-5.7-7.8-14.6-3.7-30.5 3-11.6 3.2-20.6.5-29.1C88.3 18 80.6 6.3 74.8 2.2 73.1.9 73 1 73.7 3.7z"></path>
                            </svg>
                            4.3.2 </a>
                    </span>
                </h1>

                <!-- Open/Close Toggle -->
                <a id="debug-bar-link" href="javascript:void(0)" title="Open/Close">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEPSURBVEhL7ZVLDoJAEEThRuoGDwSEG+jCuFU34s3AK3APP1VDDSGMqI1xx0s6M/2rnlHEaMZElmWrPM+vsDvsYbQ7+us0TReSC2EBrEHxCevRYuppYLXkQpC8sVCuGfTvqSE3hFdFwUGuGfRvqSE35NUAfKZrbQNQm2jrMA+gOK+M+FmhDsRL5voHMA8gFGecq0JOXLWlQg7E7AMIxZnjOiZOEJ82gFCcedUE4gS56QP8yf8ywItz7e+RituKlkkDBoIOH4Nd4HZD4NsGYJ/Abn1xEVOcuZ8f0zc/tHiYmzTAwscBvDIK/veyQ9K/rnewjdF26q0kF1IUxZIFPAVW98x/a+qp8L2M/+HMhETRE6S8TxpZ7KGXAAAAAElFTkSuQmCC">
                </a>
            </div>

            <!-- Timeline -->
            <div id="ci-timeline" class="tab">
                <table class="timeline">
                    <thead>
                        <tr>
                            <th class="debug-bar-width30">NAME</th>
                            <th class="debug-bar-width10">COMPONENT</th>
                            <th class="debug-bar-width10">DURATION</th>
                            <th>0 ms</th>
                            <th>15 ms</th>
                            <th>30 ms</th>
                            <th>45 ms</th>
                            <th>60 ms</th>
                            <th>75 ms</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="timeline-parent" id="timeline-0_parent" onclick="ciDebugBar.toggleChildRows('timeline-0');">
                            <td class="" style="--level: 0;">
                                <nav></nav>Bootstrap
                            </td>
                            <td class="">Timer</td>
                            <td class="debug-bar-alignRight">26.52 ms</td>
                            <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-0" title="29.47%"></span></td>
                        </tr>
                        <tr class="child-row" id="timeline-0_children" style="display: none;">
                            <td colspan="9" class="child-container">
                                <table class="timeline">
                                    <tbody>
                                        <tr>
                                            <td class="debug-bar-width30" style="--level: 1;">Event: pre_system</td>
                                            <td class="debug-bar-width10">Events</td>
                                            <td class="debug-bar-width10 debug-bar-alignRight">4.48 ms</td>
                                            <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-1" title="4.98%"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="" style="--level: 0;">Routing</td>
                            <td class="">Timer</td>
                            <td class="debug-bar-alignRight">0.24 ms</td>
                            <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-2" title="0.27%"></span></td>
                        </tr>
                        <tr>
                            <td class="" style="--level: 0;">Before Filters</td>
                            <td class="">Timer</td>
                            <td class="debug-bar-alignRight">0.07 ms</td>
                            <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-3" title="0.08%"></span></td>
                        </tr>
                        <tr class="timeline-parent timeline-parent-open" id="timeline-4_parent" onclick="ciDebugBar.toggleChildRows('timeline-4');">
                            <td class="" style="--level: 0;">
                                <nav></nav>Controller
                            </td>
                            <td class="">Timer</td>
                            <td class="debug-bar-alignRight">33.23 ms</td>
                            <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-4" title="36.92%"></span></td>
                        </tr>
                        <tr class="child-row" id="timeline-4_children" style="">
                            <td colspan="9" class="child-container">
                                <table class="timeline">
                                    <tbody>
                                        <tr>
                                            <td class="debug-bar-width30" style="--level: 1;">Controller Constructor</td>
                                            <td class="debug-bar-width10">Timer</td>
                                            <td class="debug-bar-width10 debug-bar-alignRight">14.84 ms</td>
                                            <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-5" title="16.49%"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="debug-bar-width30" style="--level: 1;">View: userProfile_view.php</td>
                                            <td class="debug-bar-width10">Views</td>
                                            <td class="debug-bar-width10 debug-bar-alignRight">15.51 ms</td>
                                            <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-6" title="17.23%"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="" style="--level: 0;">After Filters</td>
                            <td class="">Timer</td>
                            <td class="debug-bar-alignRight">0.94 ms</td>
                            <td class="debug-bar-noverflow" colspan="6"><span class="timer debug-bar-timeline-7" title="1.04%"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Collector-provided Tabs -->
            <div id="ci-logs" class="tab">
                <h2>Logs <span></span></h2>

                <table>
                    <thead>
                        <tr>
                            <th>Severity</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>info</td>
                            <td>Session: Class initialized using 'CodeIgniter\Session\Handlers\FileHandler' driver.</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div id="ci-files" class="tab">
                <h2>Files <span>( 118 )</span></h2>

                <table>
                    <tbody>

                        <tr>
                            <td>App.php</td>
                            <td>APPPATH/Config/App.php</td>
                        </tr>

                        <tr>
                            <td>Autoload.php</td>
                            <td>APPPATH/Config/Autoload.php</td>
                        </tr>

                        <tr>
                            <td>BaseController.php</td>
                            <td>APPPATH/Controllers/BaseController.php</td>
                        </tr>

                        <tr>
                            <td>Cache.php</td>
                            <td>APPPATH/Config/Cache.php</td>
                        </tr>

                        <tr>
                            <td>Common.php</td>
                            <td>APPPATH/Common.php</td>
                        </tr>

                        <tr>
                            <td>Constants.php</td>
                            <td>APPPATH/Config/Constants.php</td>
                        </tr>

                        <tr>
                            <td>ContentSecurityPolicy.php</td>
                            <td>APPPATH/Config/ContentSecurityPolicy.php</td>
                        </tr>

                        <tr>
                            <td>Cookie.php</td>
                            <td>APPPATH/Config/Cookie.php</td>
                        </tr>

                        <tr>
                            <td>Database.php</td>
                            <td>APPPATH/Config/Database.php</td>
                        </tr>

                        <tr>
                            <td>Events.php</td>
                            <td>APPPATH/Config/Events.php</td>
                        </tr>

                        <tr>
                            <td>Exceptions.php</td>
                            <td>APPPATH/Config/Exceptions.php</td>
                        </tr>

                        <tr>
                            <td>Feature.php</td>
                            <td>APPPATH/Config/Feature.php</td>
                        </tr>

                        <tr>
                            <td>Filters.php</td>
                            <td>APPPATH/Config/Filters.php</td>
                        </tr>

                        <tr>
                            <td>Kint.php</td>
                            <td>APPPATH/Config/Kint.php</td>
                        </tr>

                        <tr>
                            <td>Logger.php</td>
                            <td>APPPATH/Config/Logger.php</td>
                        </tr>

                        <tr>
                            <td>Modules.php</td>
                            <td>APPPATH/Config/Modules.php</td>
                        </tr>

                        <tr>
                            <td>Paths.php</td>
                            <td>APPPATH/Config/Paths.php</td>
                        </tr>

                        <tr>
                            <td>PerfilUsuarioController.php</td>
                            <td>APPPATH/Controllers/PerfilUsuarioController.php</td>
                        </tr>

                        <tr>
                            <td>Routes.php</td>
                            <td>APPPATH/Config/Routes.php</td>
                        </tr>

                        <tr>
                            <td>Services.php</td>
                            <td>APPPATH/Config/Services.php</td>
                        </tr>

                        <tr>
                            <td>Session.php</td>
                            <td>APPPATH/Config/Session.php</td>
                        </tr>

                        <tr>
                            <td>Toolbar.php</td>
                            <td>APPPATH/Config/Toolbar.php</td>
                        </tr>

                        <tr>
                            <td>UserAgents.php</td>
                            <td>APPPATH/Config/UserAgents.php</td>
                        </tr>

                        <tr>
                            <td>View.php</td>
                            <td>APPPATH/Config/View.php</td>
                        </tr>

                        <tr>
                            <td>development.php</td>
                            <td>APPPATH/Config/Boot/development.php</td>
                        </tr>

                        <tr>
                            <td>index.php</td>
                            <td>FCPATH/index.php</td>
                        </tr>

                        <tr>
                            <td>userProfile_view.php</td>
                            <td>APPPATH/Views/userProfile_view.php</td>
                        </tr>


                        <tr class="muted">
                            <td class="debug-bar-width20e">AbstractRenderer.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/Renderer/AbstractRenderer.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">AutoloadConfig.php</td>
                            <td>SYSTEMPATH/Config/AutoloadConfig.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Autoloader.php</td>
                            <td>SYSTEMPATH/Autoloader/Autoloader.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">BaseCollector.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar/Collectors/BaseCollector.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">BaseConfig.php</td>
                            <td>SYSTEMPATH/Config/BaseConfig.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">BaseHandler.php</td>
                            <td>SYSTEMPATH/Cache/Handlers/BaseHandler.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">BaseHandler.php</td>
                            <td>SYSTEMPATH/Log/Handlers/BaseHandler.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">BaseHandler.php</td>
                            <td>SYSTEMPATH/Session/Handlers/BaseHandler.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">BaseService.php</td>
                            <td>SYSTEMPATH/Config/BaseService.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">CacheFactory.php</td>
                            <td>SYSTEMPATH/Cache/CacheFactory.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">CacheInterface.php</td>
                            <td>SYSTEMPATH/Cache/CacheInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">CliRenderer.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/Renderer/CliRenderer.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">CloneableCookieInterface.php</td>
                            <td>SYSTEMPATH/Cookie/CloneableCookieInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">CodeIgniter.php</td>
                            <td>SYSTEMPATH/CodeIgniter.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Common.php</td>
                            <td>SYSTEMPATH/Common.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Config.php</td>
                            <td>SYSTEMPATH/Database/Config.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">ContentSecurityPolicy.php</td>
                            <td>SYSTEMPATH/HTTP/ContentSecurityPolicy.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Controller.php</td>
                            <td>SYSTEMPATH/Controller.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Cookie.php</td>
                            <td>SYSTEMPATH/Cookie/Cookie.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">CookieInterface.php</td>
                            <td>SYSTEMPATH/Cookie/CookieInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">CookieStore.php</td>
                            <td>SYSTEMPATH/Cookie/CookieStore.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Database.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar/Collectors/Database.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">DebugToolbar.php</td>
                            <td>SYSTEMPATH/Filters/DebugToolbar.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">DotEnv.php</td>
                            <td>SYSTEMPATH/Config/DotEnv.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Escaper.php</td>
                            <td>SYSTEMPATH/ThirdParty/Escaper/Escaper.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Events.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar/Collectors/Events.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Events.php</td>
                            <td>SYSTEMPATH/Events/Events.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Exceptions.php</td>
                            <td>SYSTEMPATH/Debug/Exceptions.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">FacadeInterface.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/FacadeInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Factories.php</td>
                            <td>SYSTEMPATH/Config/Factories.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Factory.php</td>
                            <td>SYSTEMPATH/Config/Factory.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">FileHandler.php</td>
                            <td>SYSTEMPATH/Cache/Handlers/FileHandler.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">FileHandler.php</td>
                            <td>SYSTEMPATH/Log/Handlers/FileHandler.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">FileHandler.php</td>
                            <td>SYSTEMPATH/Session/Handlers/FileHandler.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">FileLocator.php</td>
                            <td>SYSTEMPATH/Autoloader/FileLocator.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Files.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar/Collectors/Files.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">FilterInterface.php</td>
                            <td>SYSTEMPATH/Filters/FilterInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Filters.php</td>
                            <td>SYSTEMPATH/Filters/Filters.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">FormatRules.php</td>
                            <td>SYSTEMPATH/Validation/FormatRules.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">HandlerInterface.php</td>
                            <td>SYSTEMPATH/Log/Handlers/HandlerInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Header.php</td>
                            <td>SYSTEMPATH/HTTP/Header.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">IncomingRequest.php</td>
                            <td>SYSTEMPATH/HTTP/IncomingRequest.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Kint.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/Kint.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">LogLevel.php</td>
                            <td>SYSTEMPATH/ThirdParty/PSR/Log/LogLevel.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Logger.php</td>
                            <td>SYSTEMPATH/Log/Logger.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">LoggerAwareTrait.php</td>
                            <td>SYSTEMPATH/ThirdParty/PSR/Log/LoggerAwareTrait.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">LoggerInterface.php</td>
                            <td>SYSTEMPATH/ThirdParty/PSR/Log/LoggerInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Logs.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar/Collectors/Logs.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Message.php</td>
                            <td>SYSTEMPATH/HTTP/Message.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">MessageInterface.php</td>
                            <td>SYSTEMPATH/HTTP/MessageInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">MessageTrait.php</td>
                            <td>SYSTEMPATH/HTTP/MessageTrait.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Modules.php</td>
                            <td>SYSTEMPATH/Modules/Modules.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">OutgoingRequest.php</td>
                            <td>SYSTEMPATH/HTTP/OutgoingRequest.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">OutgoingRequestInterface.php</td>
                            <td>SYSTEMPATH/HTTP/OutgoingRequestInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">RendererInterface.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/Renderer/RendererInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">RendererInterface.php</td>
                            <td>SYSTEMPATH/View/RendererInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Request.php</td>
                            <td>SYSTEMPATH/HTTP/Request.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">RequestInterface.php</td>
                            <td>SYSTEMPATH/HTTP/RequestInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">RequestTrait.php</td>
                            <td>SYSTEMPATH/HTTP/RequestTrait.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Response.php</td>
                            <td>SYSTEMPATH/HTTP/Response.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">ResponseInterface.php</td>
                            <td>SYSTEMPATH/HTTP/ResponseInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">ResponseTrait.php</td>
                            <td>SYSTEMPATH/API/ResponseTrait.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">ResponseTrait.php</td>
                            <td>SYSTEMPATH/HTTP/ResponseTrait.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">RichRenderer.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/Renderer/RichRenderer.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">RouteCollection.php</td>
                            <td>SYSTEMPATH/Router/RouteCollection.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">RouteCollectionInterface.php</td>
                            <td>SYSTEMPATH/Router/RouteCollectionInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Router.php</td>
                            <td>SYSTEMPATH/Router/Router.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">RouterInterface.php</td>
                            <td>SYSTEMPATH/Router/RouterInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Routes.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar/Collectors/Routes.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Services.php</td>
                            <td>SYSTEMPATH/Config/Services.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Session.php</td>
                            <td>SYSTEMPATH/Session/Session.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">SessionInterface.php</td>
                            <td>SYSTEMPATH/Session/SessionInterface.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">TextRenderer.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/Renderer/TextRenderer.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Time.php</td>
                            <td>SYSTEMPATH/I18n/Time.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">TimeTrait.php</td>
                            <td>SYSTEMPATH/I18n/TimeTrait.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Timer.php</td>
                            <td>SYSTEMPATH/Debug/Timer.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Timers.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar/Collectors/Timers.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Toolbar.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">URI.php</td>
                            <td>SYSTEMPATH/HTTP/URI.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">UserAgent.php</td>
                            <td>SYSTEMPATH/HTTP/UserAgent.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Utils.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/Utils.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">View.php</td>
                            <td>SYSTEMPATH/Config/View.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">View.php</td>
                            <td>SYSTEMPATH/View/View.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">ViewDecoratorTrait.php</td>
                            <td>SYSTEMPATH/View/ViewDecoratorTrait.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">Views.php</td>
                            <td>SYSTEMPATH/Debug/Toolbar/Collectors/Views.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">array_helper.php</td>
                            <td>SYSTEMPATH/Helpers/array_helper.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">bootstrap.php</td>
                            <td>SYSTEMPATH/bootstrap.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">init.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/init.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">init_helpers.php</td>
                            <td>SYSTEMPATH/ThirdParty/Kint/init_helpers.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">kint_helper.php</td>
                            <td>SYSTEMPATH/Helpers/kint_helper.php</td>
                        </tr>

                        <tr class="muted">
                            <td class="debug-bar-width20e">url_helper.php</td>
                            <td>SYSTEMPATH/Helpers/url_helper.php</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div id="ci-routes" class="tab">
                <h2>Routes <span></span></h2>

                <h3>Matched Route</h3>

                <table>
                    <tbody>

                        <tr>
                            <td>Directory:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Controller:</td>
                            <td>\App\Controllers\PerfilUsuarioController</td>
                        </tr>
                        <tr>
                            <td>Method:</td>
                            <td>index</td>
                        </tr>
                        <tr>
                            <td>Params:</td>
                            <td>0 / 0</td>
                        </tr>


                    </tbody>
                </table>


                <h3>Defined Routes</h3>

                <table>
                    <thead>
                        <tr>
                            <th>Method</th>
                            <th>Route</th>
                            <th>Handler</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>GET</td>
                            <td data-debugbar-route="GET" title="http://localhost:8080/logout" style="cursor: pointer;">logout</td>
                            <td>\App\Controllers\LoginController::logout</td>
                        </tr>

                        <tr>
                            <td>GET</td>
                            <td data-debugbar-route="GET" title="http://localhost:8080/" style="cursor: pointer;">/</td>
                            <td>\App\Controllers\HomeController::index</td>
                        </tr>

                        <tr>
                            <td>GET</td>
                            <td data-debugbar-route="GET" title="http://localhost:8080/papelera" style="cursor: pointer;">papelera</td>
                            <td>\App\Controllers\PapeleraController::index</td>
                        </tr>

                        <tr>
                            <td>GET</td>
                            <td data-debugbar-route="GET">
                                <div>file/(.*)</div>
                                <form data-debugbar-route-tpl="file/?">file/<input type="text" placeholder="$1"><input type="submit" value="Go" style="margin-left: 4px;"></form>
                            </td>
                            <td>\App\Controllers\DownloadController::downloadFile/$1</td>
                        </tr>

                        <tr>
                            <td>GET</td>
                            <td data-debugbar-route="GET" title="http://localhost:8080/perfil" style="cursor: pointer;">perfil</td>
                            <td>\App\Controllers\PerfilUsuarioController::index</td>
                        </tr>

                        <tr>
                            <td>GET</td>
                            <td data-debugbar-route="GET" title="http://localhost:8080/testTotalSizeUser" style="cursor: pointer;">testTotalSizeUser</td>
                            <td>\App\Controllers\TestController::TotalSizeUser</td>
                        </tr>

                        <tr>
                            <td>GET</td>
                            <td data-debugbar-route="GET" title="http://localhost:8080/testMaxSizeUser" style="cursor: pointer;">testMaxSizeUser</td>
                            <td>\App\Controllers\TestController::MaxSizeUser</td>
                        </tr>

                        <tr>
                            <td>POST</td>
                            <td data-debugbar-route="POST">verificarEspacioDisponible</td>
                            <td>\App\Controllers\UploadFileController::espacioDisponble</td>
                        </tr>

                        <tr>
                            <td>POST</td>
                            <td data-debugbar-route="POST">verificarLimite</td>
                            <td>\App\Controllers\UploadFileController::getLimit</td>
                        </tr>

                        <tr>
                            <td>POST</td>
                            <td data-debugbar-route="POST">uploadFile</td>
                            <td>\App\Controllers\UploadFileController::subir</td>
                        </tr>

                        <tr>
                            <td>POST</td>
                            <td data-debugbar-route="POST">deleteFile</td>
                            <td>\App\Controllers\DeleteFileController::borrar</td>
                        </tr>

                        <tr>
                            <td>POST</td>
                            <td data-debugbar-route="POST">recoverFile</td>
                            <td>\App\Controllers\DeleteFileController::restaurar</td>
                        </tr>

                        <tr>
                            <td>POST</td>
                            <td data-debugbar-route="POST">permanentDelete</td>
                            <td>\App\Controllers\DeleteFileController::borradoPermanente</td>
                        </tr>

                        <tr>
                            <td>POST</td>
                            <td data-debugbar-route="POST">permanentDeleteAll</td>
                            <td>\App\Controllers\DeleteFileController::borradoPermanenteAll</td>
                        </tr>

                        <tr>
                            <td>POST</td>
                            <td data-debugbar-route="POST">testPost</td>
                            <td>\App\Controllers\TestController::Post</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div id="ci-events" class="tab">
                <h2>Events <span></span></h2>

                <table>
                    <thead>
                        <tr>
                            <th class="debug-bar-width6r">Time</th>
                            <th>Event Name</th>
                            <th>Times Called</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="narrow">4.48 ms</td>
                            <td>pre_system</td>
                            <td>1</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div id="ci-history" class="tab">
                <h2>History <span></span></h2>

                <table>
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Datetime</th>
                            <th>Status</th>
                            <th>Method</th>
                            <th>URL</th>
                            <th>Content-Type</th>
                            <th>Is AJAX?</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr data-active="1" class="current">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681859334.603291">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 23:08:54.603291</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/perfil</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681859331.824744">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 23:08:51.824744</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681855809.551555">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 22:10:09.551555</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681855075.199103">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 21:57:55.199103</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/papelera</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681855074.359819">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 21:57:54.359819</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681855073.202325">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 21:57:53.202325</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681855062.311886">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 21:57:42.311886</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681855053.144305">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 21:57:33.144305</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/login</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681855052.845238">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 21:57:32.845238</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/login</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681847493.542310">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 19:51:33.542310</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681842705.493736">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 18:31:45.493736</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681842103.724866">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 18:21:43.724866</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/login</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681842103.358218">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-18 18:21:43.358218</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/login</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681771893.871162">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-17 22:51:33.871162</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/papelera</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681771888.860351">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-17 22:51:28.860351</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681771885.214389">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-17 22:51:25.214389</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/papelera</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681771877.119977">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-17 22:51:17.119977</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681771766.599848">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-17 22:49:26.599848</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681771750.070741">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-17 22:49:10.070741</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                        <tr data-active="">
                            <td class="debug-bar-width70p">
                                <button class="ci-history-load" data-time="1681771747.073625">Load</button>
                            </td>
                            <td class="debug-bar-width190p">2023-04-17 22:49:07.073625</td>
                            <td>200</td>
                            <td>GET</td>
                            <td>http://localhost:8080/index.php/papelera</td>
                            <td>text/html; charset=UTF-8</td>
                            <td>No</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- In & Out -->
            <div id="ci-vars" class="tab">

                <!-- VarData from Collectors -->

                <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('view-data'); return false;">
                    <h2>View Data</h2>
                </a>


                <table id="view-data_table">
                    <tbody>
                    </tbody>
                </table>


                <!-- Session -->
                <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('session'); return false;">
                    <h2>Session User Data</h2>
                </a>

                <table id="session_table">
                    <tbody>
                        <tr>
                            <td>__ci_last_regenerate</td>
                            <td>
                                <pre>1681859331</pre>
                            </td>
                        </tr>
                        <tr>
                            <td>_ci_previous_url</td>
                            <td>http://localhost:8080/index.php/</td>
                        </tr>
                        <tr>
                            <td>id_usuario</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>

                <h2>Request <span>( HTTP/1.1 )</span></h2>



                <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('request_headers'); return false;">
                    <h3>Headers</h3>
                </a>

                <table id="request_headers_table">
                    <tbody>
                        <tr>
                            <td>Cookie</td>
                            <td>ci_session=tcfk3mibgp2e9tm87qsrvretbpb193fk</td>
                        </tr>
                        <tr>
                            <td>Accept-Language</td>
                            <td>es-ES,es;q=0.9,gl;q=0.8</td>
                        </tr>
                        <tr>
                            <td>Accept-Encoding</td>
                            <td>gzip, deflate, br</td>
                        </tr>
                        <tr>
                            <td>Referer</td>
                            <td>http://localhost:8080/</td>
                        </tr>
                        <tr>
                            <td>Sec-Fetch-Dest</td>
                            <td>document</td>
                        </tr>
                        <tr>
                            <td>Sec-Fetch-User</td>
                            <td>?1</td>
                        </tr>
                        <tr>
                            <td>Sec-Fetch-Mode</td>
                            <td>navigate</td>
                        </tr>
                        <tr>
                            <td>Sec-Fetch-Site</td>
                            <td>same-origin</td>
                        </tr>
                        <tr>
                            <td>Accept</td>
                            <td>text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7</td>
                        </tr>
                        <tr>
                            <td>User-Agent</td>
                            <td>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36</td>
                        </tr>
                        <tr>
                            <td>Upgrade-Insecure-Requests</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Sec-Ch-Ua-Platform</td>
                            <td>"Windows"</td>
                        </tr>
                        <tr>
                            <td>Sec-Ch-Ua-Mobile</td>
                            <td>?0</td>
                        </tr>
                        <tr>
                            <td>Sec-Ch-Ua</td>
                            <td>"Google Chrome";v="111", "Not(A:Brand";v="8", "Chromium";v="111"</td>
                        </tr>
                        <tr>
                            <td>Connection</td>
                            <td>keep-alive</td>
                        </tr>
                        <tr>
                            <td>Host</td>
                            <td>localhost:8080</td>
                        </tr>
                    </tbody>
                </table>

                <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('cookie'); return false;">
                    <h3>Cookies</h3>
                </a>

                <table id="cookie_table">
                    <tbody>
                        <tr>
                            <td>ci_session</td>
                            <td>tcfk3mibgp2e9tm87qsrvretbpb193fk</td>
                        </tr>
                    </tbody>
                </table>

                <h2>Response
                    <span>( 200 - OK )</span>
                </h2>

                <a href="javascript:void(0)" onclick="ciDebugBar.toggleDataTable('response_headers'); return false;">
                    <h3>Headers</h3>
                </a>

                <table id="response_headers_table">
                    <tbody>
                        <tr>
                            <td>Cache-control</td>
                            <td>no-store, max-age=0, no-cache</td>
                        </tr>
                        <tr>
                            <td>Content-Type</td>
                            <td>text/html; charset=UTF-8</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Config Values -->
            <div id="ci-config" class="tab">
                <h2>System Configuration</h2>

                <p class="debug-bar-alignRight">
                    <a href="https://codeigniter4.github.io/CodeIgniter4/index.html" target="_blank">Read the CodeIgniter docs...</a>
                </p>

                <table>
                    <tbody>
                        <tr>
                            <td>CodeIgniter Version:</td>
                            <td>4.3.2</td>
                        </tr>
                        <tr>
                            <td>PHP Version:</td>
                            <td>7.4.33</td>
                        </tr>
                        <tr>
                            <td>PHP SAPI:</td>
                            <td>fpm-fcgi</td>
                        </tr>
                        <tr>
                            <td>Environment:</td>
                            <td>development</td>
                        </tr>
                        <tr>
                            <td>Base URL:</td>
                            <td>
                                http://localhost:8080/
                            </td>
                        </tr>
                        <tr>
                            <td>Timezone:</td>
                            <td>UTC</td>
                        </tr>
                        <tr>
                            <td>Locale:</td>
                            <td>en</td>
                        </tr>
                        <tr>
                            <td>Content Security Policy Enabled:</td>
                            <td> No </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>