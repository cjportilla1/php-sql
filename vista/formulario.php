<?php
error_reporting(0);

session_start();



if ($_SESSION["perf"] != 'admin') {

    header('location:cerrarsesion.php');
}

include("conexion.php");


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
    <script type="text/javascript" src="../js/funciones.js"></script>











    <script>
        $(document).ready(function() {
            $('#tusuarios').DataTable();
        });
    </script>
</head>

<body>



    <div class="container col-10 text-center imgs mt-2  formulario1">

        <div class="row ">
            <div class="col-sm-4"> </div>
            <div class="col-sm-4">
                <img src="../assets/img/Logo.png" alt="" class="w-75 h-75">
            </div>
            <div class="col-sm-4"> </div>
        </div>

        <h1 class="verde titulos mt-1">Registro datos personales de empleados</h1>



        <section class="row justify-content-center p-4">





            <form class="" action="" method="POST" id="formRegistroUser">


                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputname"><span class="naranja">Nombre</span></label>
                        <input name="nombre" type="text" class="form-control" id="inputBd" placeholder="name" minlength="3" maxlength="30">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputd"><span class="naranja">Documento</span></label>
                        <input name="cedula" type="number" class="form-control" id="inputdoc" placeholder="#cedula" min="1000000" max="999999999999" minlength="7" maxlength="12">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputca"><span class="naranja">Rol</span></label>
                        <select name="cargo" id="inputcargo" class="form-control">
                            <option disabled  value="">seleccione---></option>
                            <option value="desarrollador">Desarrollador</option>
                            <option value="jefe de operaciones">Jefe de operaciones</option>
                            <option value="comercial">comercial</option>
                            <option value="auxiliar">auxiliar</option>



                        </select>
                    </div>



                </div>
                <div class="form-row">





                    <div class="form-group col-md-2">
                        <label for="inpu"><span class="naranja">F.nacimiento</span></label>
                        <input type="date" class="form-control " id="inputbplace" name="fnacimiento" placeholder="fnacimi" <?php echo 'max=' . date('Y-m-d') ?> min="1960-01-01">
                    </div>

                    <div class="form-group col-md-2 ">
                    <label for="inputca"><span class="naranja">C.residencia</span></label>
                        <select name="cresidencia" id="inputcresi" class="form-control">
                            <option disabled  value="">seleccione---></option>
                            <?php
                            $sql = "SELECT * from Ciudad";
                            $res = sqlsrv_query($con, $sql);
              
                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)){
                 echo '<option value="'.$row[0].'">'.$row[1].'</option>';
               }
                    ?>

                        </select>

                    </div>

                    <div class="form-group col-md-2">
                    <label for="inputca"><span class="naranja">C.nacimiento</span></label>
                        <select name="cnacimiento" id="inputcnaci" class="form-control">
                            <option disabled  value="">seleccione---></option>
                            <?php
                            $sql = "SELECT * from Ciudad";
                            $res = sqlsrv_query($con, $sql);
              
                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)){
                 echo '<option value="'.$row[0].'">'.$row[1].'</option>';
               }
                    ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inpu"><span class="naranja">F.ingreso</span></label>
                        <input type="date" class="form-control " id="inputfingreso" name="fingreso" placeholder="fingreso" <?php echo 'max=' . date('Y-m-d') ?>>
                    </div>

                    <div class="form-group col-md-2 ">
                        <label for="inputtel"><span class="naranja">Tel</span></label>
                        <input name="telefono" type="number" class="form-control" id="inputTel" placeholder="#telefono" min="1000000" max="999999999999" minlength="7" maxlength="12">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputcontact"><span class="naranja">Nom contacto</span></label>
                        <input name="contacto" type="text" class="form-control" id="inputA" placeholder="Primer y segundo apellido" minlength="3" maxlength="30">
                    </div>



                </div>
                <div class="form-row">



                    <div class="form-group col-md-2">
                        <label for="inputcontactphone"><span class="naranja">Tel contacto</span></label>
                        <input name="telefonoc" type="number" class="form-control" id="inputTelc" placeholder="#tel contacto" minlength="7" maxlength="12">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputRh"><span class="naranja">Rh sanguineo</span></label>
                        <select name="rhsanguineo" value="" id="inputrole" class="form-control">
                            <option disabled  value="">seleccione---></option>
                            <option value="0+">o+</option>
                            <option value="0-">o-</option>
                            <option value="a+">a+</option>
                            <option value="a-">a-</option>
                            <option value="ab-">ab-</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputState"><span class="naranja">Tipo documento</span></label>
                        <select name="idTipoDoc" id="inputDoctype" class="form-control">
                            <option value="" disabled >Seleccione una opcion</option>
                            <option value="1">c.de ciudadania</option>
                            <option value="2">t.de identidad</option>
                            <option value="3">c.de extranjero</option>

                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="inputmtransport"><span class="naranja">M.transporte</span></label>
                        <select name="medtransporte" id="inputmtrans" class="form-control">
                            <option value="" disabled >Seleccione una opcion</option>
                            <option value="transporte publico">trans publico</option>
                            <option value="transporte privado">trans privado</option>


                        </select>

                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputAddress"><span class="naranja">Direccion</span></label>
                        <input name="direccion" type="text" class="form-control" id="inputdireccion" placeholder="calle falsa 123" minlength="5" maxlength="30">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputgender"><span class="naranja">Genero</span></label>
                        <select name="genero" id="inputgender" class="form-control">
                            <option value="" disabled >Seleccione una opcion</option>
                            <option value="masculino">masculino</option>
                            <option value="femenino">femenino</option>
                            <option value="otro">otro</option>


                        </select>
                    </div>



                </div>





                <div class="form-row">

                    <div class="col-4"></div>
                    <div class="col-4">

                        <button type="button" onclick="cruduser('guardar')" class="btn btn-verde ">
                            REGISTRAR </button> <br>
                        <br>
                        <a href="cerrarsesion.php">Cerrar sesion</a>
                        <br>
                        <article id="alerta" class="alert-warning text-danger"></article>
                    </div>

                    <div class="col-4">



                    </div>

                </div>


            </form>



        </section>




    </div>


    <div class="container mt-5 col-12">
        <div class="jumbotron formulario1">
            <table id="tusuarios" class="responsive  table-striped " width="100%" height="100%">
                <thead class=" ">
                    <tr class="  text-center fverde  titulos">
                    <th>Accion</th>
                        <th>Nom</th>
                        <th>Doc</th>
                        <th>T.doc</th>
                        <th>Fnaci</th>
                        <th>C.natal</th>
                        <th>Cargo</th>
                        <th>tel</th>
                        <th>Cont per</th>
                        <th>tel cont</th>
                        <th>reside</th>
                        <th>Dir</th>
                        <th>Rh</th>
                        <th>M.trans</th>
                        <th>Genero</th>
                        <th>F.ing</th>


                    </tr>
                </thead>
                <tbody>


             
                  

                



                    <?php

               
                
                if (isset($_GET['eliminar'])) {
                              
                            
    $sqlDelete = "delete from usuarios where id =?";
    $datos = array(
        array($_GET['id'], SQLSRV_PARAM_IN),
       
    );
    $resu = sqlsrv_query($con, $sqlDelete,$datos);
    
  }


                  


                    $sql = "select id,nombre,cedula as documento,descripcion,fnacimiento,nomCiudad as lnacimineto,cargo,tel,contactp,telconta,nomCiudad as lresidencia,direccion,rh,mtransporte,genero,fechaing from usuarios u 
                    inner join TipoDocumento on tipodoc= idtipodoc
                    inner join Ciudad on ciudadn = idciudad";


                    $res = sqlsrv_query($con, $sql);


                

                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                        echo "<tr class='text-center texto' >
                        <td>  <a href='#' class='btn btn-danger' onclick='confirmDelete(".$row["id"].");'>Eliminar</button></td>
                       
                            <td>" . $row["nombre"] . "</td>
                            <td>" . $row["documento"] . "</td>
                            <td>" . $row["descripcion"] . "</td>
                            <td>" . $row["fnacimiento"]->format('Y-m-d') . "</td>
                          
                            <td>" . $row["lnacimineto"] . "</td>
                            <td>" . $row["cargo"] . "</td>
                            <td>" . $row["tel"] . "</td>
                            <td>" . $row["contactp"] . "</td>
                            <td>" . $row["telconta"] . "</td>
                           
                            <td>" . $row["lresidencia"] . "</td>
                            <td>" . $row["direccion"] . "</td>
                           
                            <td>" . $row["rh"] . "</td>
                            <td>" . $row["mtransporte"] . "</td>
                            <td>" . $row["genero"] . "</td>
                           
                            <td>" . $row["fechaing"]->format('Y-m-d') . "</td>

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