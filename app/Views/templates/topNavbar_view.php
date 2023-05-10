<div class="iq-top-navbar" style="padding-top: 13px;">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="/" class="header-logo">
                    <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                </a>
            </div>
            <div class="iq-search-bar device-search">
                <div class="input-prepend input-append">
                    <div class="btn-group">
                        <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                            <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Escribe para buscar..." onkeyup="search(this.value)"><span class="search-replace"></span>
                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        </label>
                    </div>
                </div>
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
                                        <input type="text" class="text search-input font-size-12" placeholder="Escribe para buscar">
                                        <a href="#" class="search-link"><i class="las la-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown caption-content">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="caption bg-primary line-height"><?= isset($usuario['nombre'][0]) ? strtoupper($usuario['nombre'][0]) : '?' ?></div>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                <div class="card mb-0">
                                    <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">Perfil</h4>
                                        </div>
                                        <div class="close-data text-right badge badge-primary cursor-pointer "><i class="ri-close-fill"></i></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-header">
                                            <div class="cover-container text-center">
                                                <div class="rounded-circle profile-icon bg-primary mx-auto d-block">
                                                    <?= isset($usuario['nombre'][0]) ? strtoupper($usuario['nombre'][0]) : "?" ?>
                                                    <a href=""></a>
                                                </div>
                                                <div class="profile-detail mt-3" id="profile-detail">
                                                    <h5><a href="/perfil"><?= isset($usuario['nombre']) && isset($usuario['apellidos']) ? $usuario['nombre'] . " " . $usuario['apellidos'] : "#" ?></a></h5>
                                                    <p><?= isset($usuario['email']) ? $usuario['email'] : "ERROR CORREO" ?></p>
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