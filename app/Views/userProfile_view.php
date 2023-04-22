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
        <?php include "templates/leftNavbar_view.php" ?>
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
                                            <form id="editUsuarioForm">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                            <div class="crm-profile-img-edit">
                                                                <?php if (!isset($usuario['image']) || empty($usuario['image'])) {

                                                                    if ($usuario['genero'] != "mujer") {
                                                                        $user = "assets/images/user/1.jpg";
                                                                    } else {
                                                                        $user = "assets/images/user/2.jpg";
                                                                    }
                                                                } else {
                                                                    $user = $usuario['image'];
                                                                }

                                                                ?>
                                                                <img class="crm-profile-pic rounded-circle avatar-100" src="<?= $user ?>" alt="profile-pic" id="profileImage">
                                                                <div class="crm-p-image bg-primary">
                                                                    <i class="las la-pen upload-button"></i>
                                                                    <input class="file-upload" type="file" accept="image/*" name="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname">Nombre</label>
                                                        <input type="text" class="form-control" id="fname" value="<?= $usuario['nombre'] ?>" name="nombre">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="lname">Apellidos</label>
                                                        <input type="text" class="form-control" id="lname" value="<?= $usuario['apellidos'] ?>" name="apellidos">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Correo Electronico</label>
                                                        <input type="text" class="form-control" id="email" value="<?= $usuario['email'] ?>" name="email">
                                                        <span class="text-danger"></span>
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label class="d-block">Genero:</label>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="hombre" name="genero" class="custom-control-input" value="hombre" <?= $usuario['genero'] == "hombre" ? "checked" : "" ?>>
                                                            <label class="custom-control-label" for="hombre">Hombre</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="mujer" name="genero" class="custom-control-input" value="mujer" <?= $usuario['genero'] == "mujer" ? "checked" : "" ?>>
                                                            <label class="custom-control-label" for="mujer">Mujer</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="fecha">Fecha de nacimiento</label>
                                                        <input class="form-control" id="fecha" value="<?= $usuario['fecha_nacimiento'] ?>" type="date" name="fecha_nacimiento">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="paises">País</label>
                                                        <select class="form-control" id="paises" name="pais">
                                                            <option value="">- Selecciona un pais -</option>
                                                        </select>
                                                        <script>
                                                            const select = document.getElementById("paises");
                                                            const url = "https://restcountries.com/v2/all?lang=es";
                                                            fetch(url)
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    data.sort((a, b) => a.translations.es.localeCompare(b.translations.es || b.name));
                                                                    data.forEach(country => {
                                                                        const option = document.createElement("option");
                                                                        let checkPais = "<?= $usuario['pais'] ?>";
                                                                        option.text = country.translations.es || country.name;
                                                                        option.value = country.alpha2Code;
                                                                        checkPais == option.value ? option.setAttribute('selected', 'selected') : "";
                                                                        select.add(option);
                                                                    });
                                                                })
                                                                .catch(error => console.log(error));
                                                        </script>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>

                                    <script>
                                        var form = document.getElementById('editUsuarioForm');
                                        form.addEventListener('submit', function(event) {
                                            event.preventDefault();
                                            var formData = new FormData(form);
                                            var xhr = new XMLHttpRequest();
                                            xhr.open('POST', '/editUsuario', true);

                                            xhr.onload = function() {
                                                if (xhr.status === 200) {
                                                    let result = JSON.parse(xhr.responseText);
                                                    img = result.usuario.image
                                                    profileImage.src = img;
                                                    alert("Usuario actualizado correctamente!");
                                                    //document.getElementById("fname").nextSibling.innerHTML="SASS";


                                                } else {
                                                    let error = JSON.parse(xhr.response);
                                                    //alert("Error al actualizar el usuario: "+error);
                                                }
                                            };
                                            xhr.send(formData);
                                        });
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Cambiar Contraseña</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form id="editPasswordUsuarioForm">
                                                <div class="form-group">
                                                    <label for="pass">Contraseña actual</label>

                                                    <input type="Password" class="form-control" id="pass" value="" name="pass">
                                                </div>
                                                <div class="form-group">
                                                    <label for="newPass">Nueva Contraseña</label>
                                                    <input type="Password" class="form-control" id="newPass" value="" name="newPass">
                                                </div>
                                                <div class="form-group">
                                                    <label for="newPass2">Confirma Contraseña</label>
                                                    <input type="Password" class="form-control" id="newPass2" value="" name="newPass2">
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2" id="actualizarPass">Actualizar</button>
                                            </form>
                                        </div>
                                        <script>
                                            // Seleccionar el formulario
                                            var form = document.querySelector('#editPasswordUsuarioForm');

                                            // Escuchar el evento submit del formulario
                                            form.addEventListener('submit', function(e) {
                                                // Prevenir el comportamiento por defecto del formulario (enviar por HTTP)
                                                e.preventDefault();

                                                // Obtener los datos del formulario
                                                var formData = new FormData(form);

                                                // Realizar la petición AJAX
                                                var xhr = new XMLHttpRequest();
                                                xhr.open('POST', 'editPasswordUsuario');
                                                xhr.send(formData);

                                                // Manejar la respuesta de la petición
                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                                        // La petición se ha completado y se ha recibido una respuesta exitosa
                                                        console.log(xhr.responseText);

                                                    } else if (xhr.readyState === 4 && xhr.status != 200) {
                                                        console.log(xhr.responseText);

                                                    }
                                                }
                                            });
                                        </script>
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
    <script src="assets/js/backend-bundle.min.js"></script>
    <script src="assets/js/customizer.js"></script>
    <script src="assets/js/chart-custom.js"></script>
    <!-- app JavaScript -->
    <script src="assets/js/app.js"></script>
</body>

</html>