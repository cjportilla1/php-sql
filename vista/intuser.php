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

    <title>Usuarios internos empresas</title>
    
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
 
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/datatables.min.css"/> -->


  
    <!-- <script type="text/javascript" src="../DataTables/Buttons-1.6.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../DataTables/Buttons-1.6.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../DataTables/pdfmake-0.1.36/vfs_fonts.js"></script> -->
  

   

    <script>
  function mostrarContrasena(){
      var tipo = document.getElementById("inputpass");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>

<!-- <script type="text/javascript">

$(document).ready (function () {
	$('#tusuarios').Datatable({
			languaje:{
            //     "oPaginate":{
            //         "sNext":"siguiente"
            //     },
               
            },
			responsive:"true",
			dom:'Bfrtilp',
			buttons:[
			{
					extend:'excelHtml5',
					text:'< i class="fas fa-file-excel"></i>',
					titleAttr:'Exportar a excel',
					className:'btn btn-success'
			},
			{
					extend:'pdfHtml5',
					text:'< i class="fas fa-file-pdf"></i>',
					titleAttr:'Exportar a pdf',
					className:'btn btn-danger'
			},
			{
					extend:'print',
					text:'< i class="fas fa-print"></i>',
					titleAttr:'Imprimir',
					className:'btn btn-info'
			},
		]
			
	});
});

</script> -->

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
                            <a href="anulaciones.php">Registros Anulaciones</a>
                            
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


        <div id="content" class="cuerpo mx-auto">
            <nav class="navbar navbar-expand-lg navbar-light ">

                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menú</span>
                    </button>

                </div>

            </nav>
           
            <?php     
                if ($_SESSION["perf"]=='admin') {
                    include("userintadm.inc");

                    # code...
                }elseif ($_SESSION["perf"]=='visualizacion') {
                    include("intuservisual.inc");
                    # code...
                }elseif ($_SESSION["perf"]=='camilo') {
                    include("userintadm.inc");
                    # code...
                }

            ?>

        </div>

    </div>







</body>


</html>