<?php
error_reporting(0);

session_start();



if ($_SESSION["perf"] !='admin' ) {

    header('location:cerrarsesion.php');
}

if ($_POST['insert'] = 'Registrar') {

    $documento = $_POST['documento'];
    $usuario = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $age = $_POST['edad'];
    $tel = $_POST['tele'];
    $fnaci = $_POST['fnac'];



    $query = "INSERT INTO usuarios values (?,?,?,?,?,?,?)";
    $params = array($usuario, $documento, $direccion, $age, $tel, $fnaci, null);

    $ejecutar = sqlsrv_query($con, $query, $params);


   
}


?>



<!DOCTYPE html>
<meta charset="UTF-8">
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">

    <title>php-sql</title>
    <link rel="stylesheet" href=" ../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.css">
    <link rel="stylesheet" href="../css/fuente.css">




    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>

    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../DataTables/datatables.js"></script>











    <script>
        $(document).ready(function() {
            $('#tusuarios').DataTable();
        });
    </script>
</head>

<body>



    <div class="container col-8 text-center imgs mt-2  formulario1">

    <div class="row "> 
        <div class="col-sm-4">  </div>
        <div class="col-sm-4">
        <img src="../assets/img/Logo.png" alt="" class="w-100 h-100">
        </div>
        <div class="col-sm-4">  </div>
    </div>

        <h1 class="verde titulos mt-1">Registro datos personales de empleados</h1>

       

        <section class="row justify-content-center p-4">





            <form class="" action="" method="POST" id="formRegistroUser">
             
                <div class="form-row">





                    <div class="form-group col-md-3">
                        <label for="inputAddress"><span class="naranja">Documento</span></label>
                        <input type="number" class="form-control " id="inputDoc" name="documento" placeholder="#documento" minlength="10000000" maxlength="5555555555">
                    </div>

                    <div class="form-group col-md-3 ">
                        <label for="inputState"><span class="naranja">Tipo documento</span></label>
                        <select name="idTipoDoc" id="inputDoctype" class="form-control">
                            <option value="" disabled>Seleccione una opcion</option>

                        </select>

                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputName"><span class="naranja">Nombres</span></label>
                        <input name="nombre" type="text" class="form-control" id="inputAddress2" placeholder="Primer y/o segundo nombre">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputLastName"><span class="naranja">Apellidos</span></label>
                        <input name="apellido" type="text" class="form-control" id="inputA" placeholder="Primer y segundo apellido">
                    </div>

                </div>
                <div class="form-row">



                    <div class="form-group col-md-3">
                        <label for="inputCity"><span class="naranja">Tel</span></label>
                        <input name="telefono" type="number" class="form-control" id="inputTel" placeholder="#telefono" minlength="1111111" maxlength="9999999999">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputState"><span class="naranja">Genero</span></label>
                        <select name="genero" id="inputGender" class="form-control">
                            <option selected>escoja</option>
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                            <option value="o">Otro</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputAddress2"><span class="naranja">Fnacimiento</span></label>
                        <input name="Fnacimiento" type="date" class="form-control" id="inputBd" placeholder="use calendario">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="inputState"><span class="naranja">Rol</span></label>
                        <select name="idTipoUsuario" id="inputState" class="form-control">
                            <option disabled>seleccione una opcion---></option>

                        </select>
                    </div>


                </div>


                    <div class="form-row">

                    <div class="col-4"></div>
                    <div class="col-4">

                <button type="button" onclick="cruduser('guardar')" class="btn btn-verde ">
                    REGISTRAR </button> <br>
                    <a href="cerrarsesion.php">Cerrar sesion</a>
                    </div>
                    
                    <div class="col-4">


                 
                    </div>

                    </div>
                
                <article id="alerta" class="alert-warning text-danger"></article>
            </form>



        </section>


      

    </div>


    <div class="container mt-5 col-10">
        <div class="jumbotron formulario1">
            <table id="tusuarios" class=" table table-striped " width="100%" height="auto">
                <thead class=" ">
                    <tr class=" text-center btn-verde table titulos">
                        <th>Id</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Edad</th>
                        <th>Tel</th>
                        <th>F nacimiento</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    include("conexion.php");

                    $sql = "select * from usuarios";


                    $res = sqlsrv_query($con, $sql);

                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                        echo "<tr>
                            <td class='text-center font-boulder'>" . $row["id"] . "</td>
                            <td class='text-center'>" . $row["cedula"] . "</td>
                            <td class='text-center'>" . $row["nombre"] . "</td>
                            <td class='text-center'>" . $row["direccion"] . "</td>
                            <td class='text-center'>" . $row["age"] . "</td>
                            <td class='text-center'>" . $row["tel"] . "</td>
                            <td class='text-center'>" . $row["fnacimiento"]->format('Y-m-d') . "</td>

                            </tr>";

                        // echo $row["nombre"];
                    }




                    ?>
                </tbody>
            </table>
        </div>

    </div>





</body>


</html>