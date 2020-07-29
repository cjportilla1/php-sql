<?php
error_reporting(0);


if ($_SESSION["logged"] = null) {

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


        print_r($ejecutar);
  
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
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.css" />


     
   
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

    <div class="container col-4 text-center imgs mt-5 p-5">
        <h1>CRUD PHP SQL SERVER</h1>
       
        <section class="row justify-content-center">





    <form class="" action="" method="POST" id="formRegistroUser">
        <p class="h4 mb-4 naranja"><strong>Registro de usuario</strong></p>
        <div class="form-row">





            <div class="form-group col-md-3">
                <label for="inputAddress"><span class="naranja">Documento o contraseña</span></label>
                <input type="text" class="form-control " id="inputAddress" name="documento" placeholder="#documento" minlength="6">
            </div>

            <div class="form-group col-md-3 ">
                <label for="inputState"><span class="naranja">Tipo documento</span></label>
                <select name="idTipoDoc" id="inputState" class="form-control">
                    <option value="" disabled>Seleccione una opcion</option>
                  
                </select>

            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress2"><span class="naranja">Nombres</span></label>
                <input name="nombre" type="text" class="form-control" id="inputAddress2" placeholder="Primer y/o segundo nombre">
            </div>

            <div class="form-group col-md-3">
                <label for="inputAddress2"><span class="naranja">Apellidos</span></label>
                <input name="apellido" type="text" class="form-control" id="inputA" placeholder="Primer y segundo apellido">
            </div>

        </div>
        <div class="form-row">

            

            <div class="form-group col-md-3">
                <label for="inputCity"><span class="naranja">Tel</span></label>
                <input name="telefono" type="text" class="form-control" id="inputCity" placeholder="#telefono">
            </div>

            <div class="form-group col-md-3">
                <label for="inputState"><span class="naranja">Genero</span></label>
                <select name="genero" id="input" class="form-control">
                    <option selected>escoja</option>
                    <option value="m">Masculino</option>
                    <option value="f">Femenino</option>
                    <option value="o">Otro</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="inputAddress2"><span class="naranja">Correo</span></label>
                <input name="correo" type="text" class="form-control" id="inputAddress2" placeholder="ejemplo@mail.com">
            </div>
            <div class="form-group col-sm-3">
                <label for="inputState"><span class="naranja">Rol</span></label>
                <select name="idTipoUsuario" id="inputState" class="form-control">
                    <option disabled>seleccione una opcion---></option>
                 
                </select>
            </div>
           

        </div>

       

           
           

        
        <button type="button" onclick="cruduser('guardar')" class="btn btn-primary btn-verde">
            REGISTRAR </button>
        <button type="button" onclick="cruduser('actualizar')" class="btn btn-primary btn-verde">ACTUALIZAR</button>
        <div class="text-right text-danger">¡para modificar un usuario debe poner el mismo # de documento !</div>
        <article id="alerta" class="alert-warning text-danger"></article>
    </form>



</section>
      

        <a href="cerrarsesion.php">Cerrar sesion</a>

    </div>


    <div class="container mt-5">
        <div class="jumbotron">
            <table id="tusuarios" class=" table-striped " width="100%" height="auto">
                <thead class=" ">
                    <tr class=" text-center bg-primary table">
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

                while( $row = sqlsrv_fetch_array( $res, SQLSRV_FETCH_BOTH) ) {
                       echo "<tr>
                            <td>".$row["id"]."<td>
                            <td>".$row["cedula"]."</td>
                            <td>".$row["nombre"]."</td>
                            <td>".$row["direccion"]."</td>
                            <td>".$row["age"]."</td>
                            <td>".$row["tel"]."</td>
                            <td>".$row["fnacimiento"]->format('Y-m-d')."</td>

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