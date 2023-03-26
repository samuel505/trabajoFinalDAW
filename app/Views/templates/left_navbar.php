<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="/" class="header-logo">
            <img src="assets/images/logo.png" class="img-fluid rounded-normal light-logo">
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <div class="new-create select-dropdown input-prepend input-append">
            <div class="btn-group">
                <div data-toggle="dropdown">
                    <div class="search-query selet-caption"><i class="las la-plus pr-2"></i>Create New</div><span class="search-replace"></span>
                    <span class="caret"><!--icon--></span>
                </div>
                <ul class="dropdown-menu">
                    <li>
                        <div class="item"><i class="ri-folder-add-line pr-3"></i>New Folder</div>
                    </li>
                    <li>
                        <div class="item" id="id"><i class="ri-file-upload-line pr-3"></i>Upload Files</div>
                    </li>
                    <input type="file" id="uploadFile" name="uploadFile" hidden onchange="upload()" multiple>
                    <script>
                        document.getElementById('id').addEventListener('click', function() {
                            var input = document.getElementById("uploadFile");
                            input.click();

                        });

                        function upload() {
                            const archivo = document.querySelector('input[type="file"]').files;
                            if (archivo.length > 0) {

                                const formData = new FormData();

                                for (let i = 0; i < archivo.length; i++) {
                                    formData.append('archivo[]', archivo[i]);
                                }


                                const xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                        console.log(xhr.responseText);
                                    }
                                };
                                xhr.open('POST', '/uploadFile', true);
                                xhr.send(formData);
                                uploadFile.value = '';
                            }
                        }
                    </script>
                    <li>
                        <div class="item"><i class="ri-folder-upload-line pr-3"></i>Upload Folders</div>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class=" ">
                    <a href="/" class=" ">
                        <i class="lar la-file-alt iq-arrow-left"></i><span>Files</span>
                    </a>
                    <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="" class=" ">
                        <i class="las la-stopwatch iq-arrow-left"></i><span>Recent</span>
                    </a>
                    <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="" class=" ">
                        <i class="las la-trash-alt iq-arrow-left"></i><span>Trash</span>
                    </a>
                    <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="sidebar-bottom">
            <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Storage</h4>
            <p>17.1 / 20 GB Used</p>
            <div class="iq-progress-bar mb-3">
                <span class="bg-primary iq-progress progress-1" style="width: 75%;">
                </span>
            </div>
            <p>75% Full - 3.9 GB Free</p>
            <a href="#" class="btn btn-outline-primary view-more mt-4">Buy Storage</a>
        </div>
        <div class="p-3"></div>
    </div>
</div>