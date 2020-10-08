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

    <title>Control de errores</title>
    <link rel="stylesheet" href=" ../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/formulario.css">
  
    <link rel="stylesheet" href="../css/fuente.css">
    <link rel="shortcut icon" href="../assets/img/titleem.ico">



    <link rel="stylesheet" type="text/css" href="../assets/DataTables-1.10.22/css/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="../assets/Buttons-1.6.4/css/buttons.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="../assets/Responsive-2.2.6/css/responsive.dataTables.css"/>
 

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../assets/JSZip-2.5.0/jszip.js"></script>
<script type="text/javascript" src="../assets/pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="../assets/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="../assets/DataTables-1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../assets/Buttons-1.6.4/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="../assets/Buttons-1.6.4/js/buttons.colVis.js"></script>
<script type="text/javascript" src="../assets/Buttons-1.6.4/js/buttons.flash.js"></script>
<script type="text/javascript" src="../assets/Buttons-1.6.4/js/buttons.html5.js"></script>
<script type="text/javascript" src="../assets/Buttons-1.6.4/js/buttons.print.js"></script>
<script type="text/javascript" src="../assets/Responsive-2.2.6/js/dataTables.responsive.js"></script>

    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>

  
    <script type="text/javascript" src="../js/funciones.js"></script>
    <script type="text/javascript" src="../js/solid.js"></script>
    <script type="text/javascript" src="../js/fontawesome.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>


<script>
        $(document).ready(function() {
    $('#tusuarios').DataTable( {
        dom: 'Bfrtip',

        scrollY:        "700px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
      
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 filas', '25 filas', '50 filas', 'Mostrar todos los datos' ]
        ],
       
        buttons: [
            'pageLength',
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    
                    
                    columns: ':visible',
                    orientation: 'landscape',
                   pageSize: 'LEGAL',
                  
               
                modifier: {
                    page: 'current',
                   
                }
                },
              
                
            },'colvis'
            
        ]
        

        
    } );
} );
    </script>

<script>
    function resetform() {
     $("form select").each(function() { this.selectedIndex = 0 });
     $("form  input[type=text] , form textarea").each(function() { this.value = '' });
     $("form input[type=number]").each(function() { this.value = '' });
     $("form input[type=date]").each(function() { this.value = '' });
     $_POST=array();
}
</script>

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
                    <a href="https://energymaster.app/index.php/index " target="_blank" >Energyapp</a>
                </li>
               
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Colaboradores</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="formulario.php">Datos personales colaboradores</a>
                        </li>

                  
                      
                    </ul>
                    <br>
                    <br>
                    <?php  echo $_SESSION["perf"]." ha iniciado sesion" ?>
        </nav>


        <div id="content" class=" mx-auto">


            <?php

            if ($_SESSION["perf"] == 'admin') {
                include("anuladm.inc");

                # code...
            }elseif ($_SESSION["perf"]=='visualizacion') {
                include("anulvisual.inc");
            }elseif ($_SESSION["perf"]=='camilo') {
                include("anuladm.inc");
            }
            

            ?>



        </div>

    </div>







</body>


</html>