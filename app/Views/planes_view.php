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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="  ">
    <div class="wrapper">
        <?php include "templates/leftNavbar_view.php" ?>
        <?php include "templates/topNavbar_view.php" ?>
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="pricing-custom-tab w-100">
                        <div class="pricing-content">
                            <div id="pricing-data2" class="tab-pane fade active show">
                                <div class="d-flex align-items-center">
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="card card-block card-stretch card-height blog pricing-details">
                                            <div class="card-body border text-center rounded">
                                                <div class="pricing-header bg-primary text-white">
                                                    <div class="icon-data"><i class="ri-star-line"></i>
                                                    </div>
                                                    <h2 class="mb-4 display-5 font-weight-bolder text-white">FREE</h2>
                                                </div>
                                                <h4 class="mb-3"><?= $planes[0]['nombre_plan'] ?></h4>
                                                <ul class="list-unstyled mb-0 pricing-list">
                                                    <li><i class="lar la-check-circle text-primary mr-2 font-size-20"></i><?= $planes[0]['GB'] ?>Gb de almacenamiento</li>
                                                    <li><i class="lar la-check-circle text-primary mr-2 font-size-20"></i>Banda ancha ilimitada</li>

                                                </ul> <button class="btn btn-primary mt-5" title="<?= $planes[0]['id_plan'] ?>" onclick="cambioPlan(this.title)" id="plan0"><?= isset($usuario['id_plan']) && $usuario['id_plan'] == 0 ? "ACTIVADO" : "USAR" ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-lg-4 col-sm-6">
                                        <div class="card card-block card-stretch card-height blog pricing-details">
                                            <div class="card-body border text-center rounded">
                                                <div class="pricing-header bg-success text-white">
                                                    <div class="icon-data"><i class="ri-star-line"></i>
                                                    </div>
                                                    <h2 class="mb-4 display-5 font-weight-bolder text-white"><?= $planes[1]['precio'] ?>€<small class="font-size-14">/ Mes</small></h2>
                                                </div>
                                                <h4 class="mb-3"><?= $planes[1]['nombre_plan'] ?></h4>
                                                <ul class="list-unstyled mb-0 pricing-list">
                                                    <li><i class="lar la-check-circle text-primary mr-2 font-size-20"></i><?= $planes[1]['GB'] ?>Gb de almacenamiento</li>
                                                    <li><i class="lar la-check-circle text-primary mr-2 font-size-20"></i>Banda ancha ilimitada</li>
                                                </ul> <button class="btn btn-primary mt-5" title="<?= $planes[1]['id_plan'] ?>" onclick="cambioPlan(this.title)" id="plan1"><?= isset($usuario['id_plan']) && $usuario['id_plan'] == 1 ? "ACTIVADO" : "USAR" ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-lg-4 col-sm-6">
                                        <div class="card card-block card-stretch card-height blog pricing-details">
                                            <div class="card-body border text-center rounded">
                                                <div class="pricing-header bg-danger text-white">
                                                    <div class="icon-data"><i class="ri-star-line"></i>
                                                    </div>
                                                    <h2 class="mb-4 display-5 font-weight-bolder text-white"><?= $planes[2]['precio'] ?>€<small class="font-size-14">/ Mes</small></h2>
                                                </div>
                                                <h4 class="mb-3"><?= $planes[2]['nombre_plan'] ?></h4>
                                                <ul class="list-unstyled mb-0 pricing-list">
                                                    <li><i class="lar la-check-circle text-primary mr-2 font-size-20"></i><?= $planes[2]['GB'] ?>Gb de almacenamiento</li>
                                                    <li><i class="lar la-check-circle text-primary mr-2 font-size-20"></i>Banda ancha ilimitada</li>
                                                </ul> <button class="btn btn-primary mt-5" title="<?= $planes[2]['id_plan'] ?>" onclick="cambioPlan(this.title)" id="plan2"><?= isset($usuario['id_plan']) && $usuario['id_plan'] == 2 ? "ACTIVADO" : "USAR" ?></button>
                                            </div>
                                            <script>
                                                function cambioPlan(plan) {

                                                    $.ajax({
                                                        type: "POST",
                                                        url: '/cambioPlan',
                                                        data: {
                                                            "plan": plan
                                                        },
                                                        success: function(result) {
                                                            result = JSON.parse(result);
                                                            console.log(result);
                                                            if (result.new) {
                                                                document.getElementById(("plan" + plan)).innerHTML = "ACTIVADO";
                                                                document.getElementById(("plan" + result.old)).innerHTML = "USAR";
                                                            }
                                                        },
                                                        fail: function() {
                                                            alert("error al actualizar el plan");
                                                        }
                                                    });
                                                }





                                                
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
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Politica de privacidad</a>
                        </li>
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
    <script src="assets/js/chart-custom.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>