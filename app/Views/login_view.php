<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>FileHub Login</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/css/backend.css">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
   <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row justify-content-center align-items-center height-self-center">
               <div class="col-md-5 col-sm-12 col-12 align-self-center">
                  <?php if (isset($errores) && !empty($errores)) { ?>
                     <div class="alert alert-danger" role="alert">
                        <div class="iq-alert-text">El <b>correo</b> y/o <b>contraseña</b> son incorrectos</div>
                     </div>
                  <?php } ?>
                  <div class="sign-user_card">
                     <img src="assets/images/logo.png" class="img-fluid rounded-normal light-logo logo" alt="logo">
                     <h3 class="mb-3">Iniciar sesión</h3>
                     <form action="/login" method="POST">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" type="email" placeholder=" " name="email" id="email" value="<?= isset($datos['email']) ? $datos['email'] : ""?>" required>
                                 <label>Correo</label>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" type="password" placeholder=" " name="password" required>
                                 <label>Contraseña</label>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="custom-control custom-checkbox mb-3 text-left">
                                 <input type="checkbox" class="custom-control-input" id="recuerdame">
                                 <label class="custom-control-label" for="recuerdame">Recuerdame</label>
                                 <script>
                                    let recuerdameInput = document.getElementById("recuerdame");

                                    window.addEventListener("load",() => {
                                       var miCookie = document.cookie.replace(/(?:(?:^|.*;\s*)correo\s*\=\s*([^;]*).*$)|^.*$/, "$1");
                                      let submit = document.getElementById("submit");
                                       if (miCookie!="NULL") {
                                          email.value = miCookie;
                                          recuerdameInput.checked=true;
                                       }
                                       submit.addEventListener("click", () => {
                                          if (recuerdameInput.checked==false) {
                                             document.cookie = "correo=NULL";
                                          } else {
                                             document.cookie = "correo="+email.value;
                                          }
                                       });

                                    })
                                 </script>
                              </div>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">Iniciar sesión</button>
                        <p class="mt-3">
                           ¿No tienes una cuenta? <a href="/register" class="text-primary" style="text-decoration:underline;">Crea una ahora</a>
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