<!DOCTYPE html>
<?php
include("vista/conexion.php");

?>
<meta charset="UTF-8">
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width device.width, initial-scale=1">
    <title>php-sql</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\login.css">
    <script src="js/funciones.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>

<script src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</head>


<section class="container-fluid mt-5">
<div class="container">

<!-- Outer Row -->

            <h3 class="text-center verde">Registro datos personales de empleados</h3>

<div class="row justify-content-center ">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5 formulario1">
      <div class="card-body p-0 ">
        <!-- Nested Row within Card Body -->
        <div class="row ">
          <div class="col-lg-6 d-none d-lg-block imgs  p-3"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
              
              </div>
              <form class="user" id="formLogin" method="POST">
                <div class="form-group">
                  <input type="email" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="ejemplo@mail.com">
                </div>
                <div class="form-group">
                  <input type="password" name="passuser" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                </div>
                <div class="form-group">
                <hr>

                </div>

                <button type="button" onclick="loginUser()" id="" class="btn btn-success btn-user btn-block "><svg class="bi bi-person-check-fill" width="2em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
						</svg> Ingresar</button>
                

                
              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</section>