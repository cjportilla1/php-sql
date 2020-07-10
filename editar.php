<?php

if (isset($_GET['editar'])){

    $editar_id = $_GET['editar'];

    $sql = "select * from usuarios where id ='$editar_id' ";


     $res = sqlsrv_query($con, $sql);


     $row= sqlsrv_fetch_array($res);

     $documento = $row[2];
     $usuario = $row[1];
     $direccion = $row[3];
     $age = $row[4];
     $tel = $row[5];
     $fnaci = $row[6];
 

}
?>

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

</head>

<div class="container col-4 text-center formulario1 mt-5 p-4">
        <h1>CRUD PHP SQL SERVER</h1>
        <form action="formulario.php" method="POST">

            <div class="form-gruop row">

                <div class="col-6">

                    <div class="form-group">

                        <label for="">Cedula</label><br>
                        <input type="number" name="documento" required="required" min="10000" max="9999999999" class="form control badge-pill" value="<?php echo $documento ?>">



                    </div>
                </div>

                <div class="col-6 mx-auto">

                    <div class="form-group ">
                        <label for="">Nombre</label><br>
                        <input type="text" name="nombre" required="required" class="form control badge-pill" value="<?php echo $usuario ?>" >


                    </div>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-6">

                    <div class="form-group">
                        <label for="">Direccion</label><br>
                        <input type="text" name="direccion" class="form control badge-pill" value="<?php echo $direccion ?>">


                    </div>

                </div>

                <div class="col-6">

                    <div class="form-group">
                        <label for="">Edad</label><br>

                        <input type="number" name="edad" min="18" max="70" required="required" class="form control badge-pill" value="<?php echo $age ?>">

                        </select>




                    </div>

                </div>

            </div>

            <div class="form-group row">

                <div class="col">
                    <div class="form-group">
                        <label for="">Telefono</label><br>
                        <input type="number" name="tele" class="form control badge-pill" value="<?php echo $tel ?>">

                    </div>

                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Fecha nacimiento</label><br>
                        <input type="date" name="fnac" class="form control badge-pill" value="<?php echo $fnaci->format('Y-m-d') ?>">


                    </div>

                </div>

            </div>



            <div class="form-group row">



                <div class="col"> <input type="submit" name="actualizar" class="btn btn-success badge-pill" value="Actualizar"> </div>

            





            </div>



        </form>

        <a href="cerrarsesion.php">Cerrar sesion</a>

    </div>


    <?php

if (isset($_POST['actualizar'])){


    $Updocumento = $_POST['documento'];
    $Upusuario = $_POST['nombre'];
    $Updireccion = $_POST['direccion'];
    $Upage = $_POST['edad'];
    $Uptel = $_POST['tele'];
    $Upfnaci = $_POST['fnac'];

    

  
    $query = "update usuarios set (?,?,?,?,?,?,?) where id ='$editar_id' ";
    $params = array($UPusuario, $Updocumento, $Updireccion, $Upage, $Uptel, $Upfnaci, null);

    $ejecutar = sqlsrv_query($con, $query, $params);

        if ($ejecutar) {

            echo "<script> alert('datos actualizados')</script>";
            echo "<script> window.open('formulario.php','_self')</script>";

            # code...
        }

 

}
?>