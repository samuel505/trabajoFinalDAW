<script>
    function checkDisponible(array) {
        // Obtener el tamaño del archivo que se va a subir
        let fileSize = 0;
        //
        for (let i = 0; i < array.length; i++) {
            fileSize += array[i].size;
        }

        // Crear una nueva solicitud AJAX
        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);

                // Verificar si hay suficiente espacio disponible
                if (response >= fileSize) {
                    uploadFile(array);
                } else {
                    alert("Error sobrepasa el espacio disponible");
                }
            }

        }
        // Establecer la URL del controlador que realiza la verificación
        xhr.open('POST', '/verificarEspacioDisponible', true);
        // Enviar la solicitud
        xhr.send(fileSize);
    }

    function checkFileLimit() {

        // Crear una nueva solicitud AJAX
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/verificarLimite', true);
        // Enviar la solicitud 
        xhr.send();
        // Configurar la solicitud
        errores = [];

        let array = document.querySelector('input[type="file"]').files;
        xhr.onreadystatechange = function() {

            if (xhr.readyState === 4 && xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                for (let i = 0; i < array.length; i++) {
                    tam = array[i].size;

                    if (response < tam) {
                        errores.push("error");
                    }
                }

                if (errores.length == 0) {
                    checkDisponible(array);
                } else {
                    alert("Error sobrepasa limite de tamaño del archivo");
                }
            }
        }
    }
</script>
<div class="iq-sidebar  sidebar-default " id="leftMenu">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="/" class="header-logo">
            <img src="assets/images/logo.png" class="img-fluid rounded-normal light-logo">
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <div class="new-create select-dropdown input-prepend input-append <?= \Config\Services::uri()->getPath() == "papelera" ? "d-none" : "" ?>">
            <div class="btn-group ">
                <div data-toggle="dropdown">
                    <div class="search-query selet-caption"><i class="las la-plus pr-2"></i>Crear nueva</div><span class="search-replace"></span>
                    <span class="caret"><!--icon--></span>
                </div>
                <ul class="dropdown-menu">
                    <li>
                        <div class="item"><i class="ri-folder-add-line pr-3"></i>Carpeta</div>
                    </li>
                    <li>
                        <div class="item" id="subida" onclick="clickInput()"><i class="ri-file-upload-line pr-3"></i>Subida de archivo</div>
                    </li>
                    <input type="file" id="uploadFile" name="uploadFile" hidden onchange="checkFileLimit()" multiple>
                    <li>
                        <div class="item"><i class="ri-folder-upload-line pr-3"></i>Subir archivos</div>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="<?= \Config\Services::uri()->getPath() == "/" ? "active" : "" ?>">
                    <a href="/" class=" ">
                        <i class="lar la-file-alt iq-arrow-left"></i><span>Archivos</span>
                    </a>
                    <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="" class=" ">
                        <i class="las la-stopwatch iq-arrow-left"></i><span>Recientes</span>
                    </a>
                    <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class="<?= \Config\Services::uri()->getPath() == "papelera" ? "active" : "" ?>">
                    <a href="/papelera" class=" ">
                        <i class="las la-trash-alt iq-arrow-left"></i><span>Papelera</span>
                    </a>
                    <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="sidebar-bottom">
            <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Almacenamiento</h4>
            <p><?= round($OccupiedSize, 3) ?>/<?= $TotalSize ?> GB Usado</p>
            <div class="iq-progress-bar mb-3">
                <?php //var_dump($TotalSize);die(); 
                ?>
                <span class="bg-primary iq-progress progress-1" style="width: <?= round(100 - (($TotalSize - $OccupiedSize) / $TotalSize) * 100, 3) ?>%;">
                </span>
            </div>
            <p><?= round(100 - (($TotalSize - $OccupiedSize) / $TotalSize) * 100, 3) ?>% Full - <?= round($TotalSize - $OccupiedSize, 3) ?> GB Free</p>
            <a href="#" class="btn btn-outline-primary view-more mt-4">Ampliar espacio</a>
        </div>
        <div class="p-3"></div>
    </div>
</div>
<script>
    const xhr = new XMLHttpRequest();

    function clickInput() {

        var input = document.getElementById("uploadFile");
        input.click();

    };

    function uploadFile(archivo) {


        if (archivo.length > 0) {

            const formData = new FormData();

            for (let i = 0; i < archivo.length; i++) {
                if (existeArchivo(archivo[i])) {
                    formData.append('archivo[]', archivo[i]);
                }

            }

            // Mostrar la barra de carga al empezar la subida
            xhr.upload.onloadstart = function() {
                //console.log('Subiendo archivo...');

                modalUploadFile.style.display = "block";
                modalUploadFile.style.paddingRight = "4px";

            };

            // Actualizar el progreso de la subida
            xhr.upload.onprogress = function(event) {
                if (event.lengthComputable) {
                    let percentComplete = (event.loaded / event.total) * 100;
                    //console.log('Progreso de la subida: ' + percentComplete + '%');

                    barraDeCarga.style.width = Math.floor(percentComplete) + "%";
                    barraDeCarga.innerHTML = Math.floor(percentComplete) + "%";

                }
            };

            // Ocultar la barra de carga al finalizar la subida
            xhr.upload.onload = function() {
                //console.log('Archivo subido exitosamente!');

                modalUploadFile.style.display = "none";
                modalUploadFile.style.paddingRight = "0px";
                barraDeCarga.innerHTML = "0%";
                barraDeCarga.style.width = "0%";
            };


            xhr.open('POST', '/uploadFile?reemplazar=' + false, true);
            xhr.onreadystatechange = reloadFiles;
            xhr.send(formData);

            uploadFile.value = '';


        }else{
            let respuesta = xhr.responseText;
            console.log(respuesta);
        }
    }

    function reloadFiles() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let respuesta = xhr.responseText;
            let array1 = JSON.parse(respuesta);
            array = array1['archivos'];
            let URLactual = window.location.origin;


            let lMenu = "";
            let string = "";
            for (let i = 0; i < array.length; i++) {
                let archivo = array[i];
                let url = URLactual + '/file/' + archivo['filecode'] + '.' + archivo['type'];

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
    </div>`

            }
            // console.log(array1['OccupiedSize']);
            let n1 = (100 - ((array1['TotalSize'] - array1['OccupiedSize']) / array1['TotalSize']) * 100).toFixed(3);

            let n2 = (array1['TotalSize'] - array1['OccupiedSize']).toFixed(3);
            lMenu = '<div class="iq-sidebar  sidebar-default " id="leftMenu"> <div class="iq-sidebar-logo d-flex align-items-center justify-content-between"> <a href="/" class="header-logo"> <img src="assets/images/logo.png" class="img-fluid rounded-normal light-logo"> </a> <div class="iq-menu-bt-sidebar"> <i class="las la-bars wrapper-menu"></i> </div> </div> <div class="data-scrollbar" data-scroll="1"> <div class="new-create select-dropdown input-prepend input-append  ' + (window.location.pathname == 'papelera' ? 'd-none' : '') + '"> <div class="btn-group "> <div data-toggle="dropdown"> <div class="search-query selet-caption"><i class="las la-plus pr-2"></i>Crear nueva</div><span class="search-replace"></span> <span class="caret"><!--icon--></span>  </div> <ul class="dropdown-menu"> <li> <div class="item"><i class="ri-folder-add-line pr-3"></i>Carpeta</div> </li> <li> <div class="item" id="subida" onclick="clickInput()"><i class="ri-file-upload-line pr-3"></i>Subida de archivo</div> </li> <input type="file" id="uploadFile" name="uploadFile" hidden onchange="checkFileLimit()" multiple> <li> <div class="item"><i class="ri-folder-upload-line pr-3"></i>Subir archivos</div> </li> </ul> </div> </div> <nav class="iq-sidebar-menu"> <ul id="iq-sidebar-toggle" class="iq-menu"> <li class="' + (window.location.pathname == "/" ? "active" : '') + '"> <a href="/" class=" "> <i class="lar la-file-alt iq-arrow-left"></i><span>Archivos</span> </a> <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle"> </ul> </li> <li class=" "> <a href="" class=" "> <i class="las la-stopwatch iq-arrow-left"></i><span>Recientes</span> </a> <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle"> </ul> </li> <li class="' + (window.location.pathname == "papelera" ? "active" : "") + '"> <a href="/papelera" class=" "> <i class="las la-trash-alt iq-arrow-left"></i><span>Papelera</span> </a> <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle"> </ul> </li> </ul> </nav> <div class="sidebar-bottom"> <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Almacenamiento</h4> <p>' + array1['OccupiedSize'].toFixed(3) + '/' + array1['TotalSize'].toFixed(3) + 'GB Usado</p> <div class="iq-progress-bar mb-3"> <span class="bg-primary iq-progress progress-1" style="width: ' + n1 + '%"> </span> </div> <p> ' + n1 + '% Full - ' + n2 + ' GB Free</p> <a href="#" class="btn btn-outline-primary view-more mt-4">Ampliar espacio</a> </div> <div class="p-3"></div> </div> </div>';
            leftMenu = document.getElementById('leftMenu');
            archivos = document.getElementById('archivos');
            archivos.innerHTML = string;
            leftMenu.innerHTML = lMenu;

        } else {
            let respuesta = xhr.responseText;
            console.log(respuesta);
        }
    }

    function existeArchivo(archivo) {

        if (false) {

            if (false) {
                return true;
            } else {
                return false
            }
        } else {
            return true;
        }

    }



    // por hacer: mostar un mensaje de copiado, hacer un contador y quitar el mensaje



    function reloadSizebar() {


    }
</script>