<?php
error_reporting(0);
include("conexion.php");

if ($_SESSION["logged"] = false) {

    header('location:cerrarsesion.php');
}

if ($_POST['insert'] = 'Registrar')  {

    $documento = $_POST['documento'];
    $usuario = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $age = $_POST['edad'];
    $tel = $_POST['tele'];
    $fnaci = $_POST['fnac'];



    $query = "INSERT INTO usuarios values (?,?,?,?,?,?,?)";
    $params = array($usuario, $documento, $direccion, $age, $tel, $fnaci, null);

    $ejecutar = sqlsrv_query($con, $query, $params);


    if ($ejecutar) {
        echo "<h3>insertado correctamente</h3>";
        # code...
    }
}

if (isset($_GET['editar'])) {
    include ("editar.php");
    # code...
}


?>



<!DOCTYPE html>
<meta charset="UTF-8">
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    
    <title>php-sql</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\formulario.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css" />

   

    <script type="text/javascript" src="js/jQuery.js"></script>

    <script src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>


   
  
    <script type="text/javascript" src="DataTables/datatables.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

   

<script>
     $(document).ready(function() {
            $('#tusuarios').DataTable();
        });
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>

    <div class="container col-4 text-center formulario1 mt-5 p-4">
        <h1>CRUD PHP SQL SERVER</h1>
        <form action="formulario.php" method="POST">

            <div class="form-gruop row">

                <div class="col-6">

                    <div class="form-group">

                        <label for="">Cedula</label><br>
                        <input type="number" name="documento" required="required" min="10000" max="9999999999" class="form control badge-pill" placeholder="Documento">



                    </div>
                </div>

                <div class="col-6 mx-auto">

                    <div class="form-group ">
                        <label for="">Nombre</label><br>
                        <input type="text" name="nombre" required="required" class="form control badge-pill" placeholder="Escribe tu nombre">


                    </div>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-6">

                    <div class="form-group">
                        <label for="">Direccion</label><br>
                        <input type="text" name="direccion" class="form control badge-pill" placeholder="Direccion">


                    </div>

                </div>

                <div class="col-6">

                    <div class="form-group">
                        <label for="">Edad</label><br>

                        <input type="number" name="edad" min="18" max="70" required="required" class="form control badge-pill" placeholder="Edad">

                        </select>




                    </div>

                </div>

            </div>

            <div class="form-group row">

                <div class="col">
                    <div class="form-group">
                        <label for="">Telefono</label><br>
                        <input type="number" name="tele" class="form control badge-pill" placeholder="Telefono">

                    </div>

                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Fecha nacimiento</label><br>
                        <input type="date" name="fnac" class="form control badge-pill" placeholder="birth">


                    </div>

                </div>

            </div>



            <div class="form-group row">



                <div class="col"> <input type="submit" name="insert" class="btn btn-success badge-pill" value="Registrar"> </div>

            





            </div>



        </form>

        <a href="cerrarsesion.php">Cerrar sesion</a>

    </div>


    <div class="container mt-5">
        <div class="jumbotron">
            <table id="tusuarios" class=" table-striped " width="100%" height="500px%">
                <thead class=" ">
                    <tr class=" text-center bg-primary table">
                    <th>Id</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Edad</th>
                        <th>Tel</th>
                        <th>F nacimiento</th>
                        <th>Accion</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <?php

                $sql = "select * from usuarios";


                $res = sqlsrv_query($con, $sql);

                while ($row = sqlsrv_fetch_array($res)) {
                    echo '<tr class="text-center font-weight-bold">
                <td>' . $row[0] . '</td>
                <td>' . $row[1] . '</td>
                <td>' . $row[2] . '</td>
                <td>' . $row[3] . '</td>
                <td>' . $row[4] . '</td>
                <td>' . $row[5] . '</td>
                <td>' . $row[6]->format('Y-m-d'). '</td>
                <td><a href="formulario.php?editar='.$row[0].'">Editar</a></td>
                <td><a href="formulario.php?borrar='.$row[0].'">Borrar</a></td>
             
                <tr>';

            
                }

                ?>

            </table>
        </div>

    </div>


  
  

</body>


</html>