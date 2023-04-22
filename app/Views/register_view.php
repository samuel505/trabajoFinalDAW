<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Register FileHub</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <link rel="stylesheet" href="css/backend.css?v=1.0.0">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
   <div id="loading" style="display: none;">
      <div id="loading-center">
      </div>
   </div>
   <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row justify-content-center align-items-center height-self-center">
               <div class="col-md-5 col-sm-12 col-12 align-self-center">
                  <?php if (isset($errores) && !empty($errores)) { ?>
                     <div class="alert text-white bg-danger" role="alert">
                        <div class="iq-alert-text"><?=$errores?></div>
                     </div>
                  <?php } ?>
                  <div class="sign-user_card">
                     <img src="assets/images/logo.png" class="img-fluid rounded-normal light-logo logo" alt="logo">
                     <h3 class="mb-3">Registrarse</h3>
                     <p>Crea tu cuenta</p>
                     <form action="/register" method="POST">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" type="text" placeholder=" " name="nombre">
                                 <label>Nombre</label>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" type="text" placeholder=" " name="apellidos">
                                 <label>Apellidos</label>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" type="email" placeholder=" " name="email">
                                 <label>Correo</label>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" type="password" placeholder=" " name="password">
                                 <label>Contraseña</label>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" type="password" placeholder=" " name="password2">
                                 <label>Confirmar contraseña</label>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="custom-control custom-checkbox mb-3 text-left">
                                 <input type="checkbox" class="custom-control-input" id="customCheck1">
                                 <label class="custom-control-label" for="customCheck1">Aceptar terminos y condiciones</label>
                              </div>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">Registarte</button>
                        <script>
                           document.getElementById("submit").addEventListener("click", (e) => {
                              if (!customCheck1.checked) {
                                 e.preventDefault();
                                 alert("Tienes que aceptar los terminos y condiciones para continuar");
                              }
                           });
                        </script>
                        <p class="mt-3">
                           Ya tienes una cuenta? <a href="/login" class="text-primary">Inicia sesión</a>
                        </p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
































</body>

</html>