<?php
error_reporting(0);

session_start();
include("conexion.php");


if (empty($_SESSION["logged"])) {
    header("location:cerrarsesion.php");
}



?>



<!DOCTYPE html>
<meta charset="UTF-8">
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">

    <title>Comercializadores</title>
    <link rel="stylesheet" href=" ../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.css">
    <link rel="stylesheet" href="../css/fuente.css">
    <link rel="shortcut icon" href="../assets/img/titleem.ico">
  


    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>



    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../DataTables/datatables.js"></script>
    <script type="text/javascript" src="../js/funciones.js"></script>
    <script type="text/javascript" src="../js/solid.js"></script>
    <script type="text/javascript" src="../js/fontawesome.js"></script>

    <script>
function habilCont(campoCantidad)
{
	var estadoActual = document.getElementById(campoCantidad)

	if(estadoActual.disabled == true)
	{
		estadoActual.disabled=false;
	}
	else
	{
		estadoActual.disabled=true;
	}
}
</script>



    <script type="text/javascript">
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>


    <script>
        $(document).ready(function() {
            $('#tusuarios').DataTable();
        });
    </script>

<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("inputpasscomer");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
</head>

<body>



    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header border border-success ">
                <img src="../assets/img/Logo.png" alt="" class="w-100 h-100 ">
            </div>

            <ul class="list-unstyled components">
                <p> Módulo interno</p>
            

                <li class="">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Empresas</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="intuser.php">Usuarios internos EM</a>
                        </li>
                        <li>
                            <a href="comerc.php">Comercializadores</a>
                        </li>
                        <li>
                            <a href="transbot.php">Transacciones Bot</a>
                        </li>
                        <li>
                            <a href="historicos.php">Registro Consumos Históricos</a>
                        </li>
                        <li>
                            <a href="anulaciones.php">Control de errores</a>
                            
                        </li>
                        <li>
                            <a href="modgob.php">Modelo de gobierno</a>
                            
                        </li>
                    
                    </ul>
                </li>
                <li>
                    <a href="https://energymaster.app/index.php/index">Energyapp</a>
                </li>
               
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Colaboradores</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="formulario.php">Datos personales colaboradores</a>
                        </li>
                      
                    </ul>
        </nav>


        <div id="content" class=" mx-auto">


            <?php

            if ($_SESSION["perf"] == 'admin') {
                include("comercadmin.inc");

                # code...
            }elseif ($_SESSION["perf"]=='visualizacion') {
                include("forvisual.inc");
            }elseif ($_SESSION["perf"]=='camilo') {
                include("comercadmin.inc");
                # code...
            }

            

            ?>



        </div>

    </div>







</body>


</html>