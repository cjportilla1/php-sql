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
                <p> Menú principal</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Empleados</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="formulario.php">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="intuser.php">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
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
            <div class="container col-10 text-center imgs mt-2  formulario1">


                <h1 class="verde titulos ">Registro datos personales de empleados</h1>



                <section class="row justify-content-center p-4">





                    <form class="" action="" method="POST" id="formRegistroUser" ectype="multipart/form-data">


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for=""><span class="font-weight-bold">Nombre completo</span></label>
                                <input name="nombre" type="text" class="form-control" id="nombreid" placeholder="Nombre" minlength="3" maxlength="40" value="<?php echo $_POST["nombre"]; ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputd"><span class="font-weight-bold">Documento</span></label>
                                <input name="cedula" type="number" class="form-control" id="inputdoc" placeholder="#Cedula" min="1000000" max="999999999999" minlength="7" maxlength="12" value="<?php echo $_POST["cedula"]; ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputca"><span class="font-weight-bold">Rol</span></label>
                                <select name="cargo" id="inputcargo" class="form-control">
                                    <?php
                                    if (empty($_POST["cargo"])) {

                                        echo "<option value=''> seleccione--> ";
                                        # code...
                                    } else {
                                        echo "<option value='" . $_POST["cargo"] . "'>" . $_POST["cargo"] . " ";
                                    }
                                    ?>
                                    <option value="Desarrollador">Desarrollador</option>
                                    <option value="Chief operating officer">Chief operating officer</option>
                                    <option value="Sales manager colombia">Sales manager colombia</option>
                                    <option value="Abogada">Abogada</option>
                                    <option value="Analista de centralización">Analista de centralización</option>
                                    <option value="Líder de gestión">Líder de gestión</option>
                                    <option value="Líder de gestión">Coordinador de ingeniería</option>
                                    <option value="International sales director">International sales director</option>
                                    <option value="Analista financiera">Analista financiera</option>



                                </select>
                            </div>



                        </div>
                        <div class="form-row">





                            <div class="form-group col-md-2">
                                <label for="inpu"><span class="font-weight-bold">Fec nacimiento</span></label>
                                <input type="date" value="<?php echo $_POST["fnacimiento"]; ?>" class="form-control " id="inputbplace" name="fnacimiento" placeholder="fnacimi" <?php echo 'max=' . date('Y-m-d') ?> <?php echo 'min=' . date('(Y-18)-m-d') ?>>
                            </div>

                            <div class="form-group col-md-2 ">
                                <label for="inputca"><span class="font-weight-bold">Ciudad actual</span></label>
                                <select name="cresidencia" id="inputcresi" class="form-control">
                                    <?php
                                    if (empty($_POST["cresidencia"])) {
                                        echo "<option value=''> seleccione->";
                                        # code...
                                    } else {
                                        echo "<option value='" . $_POST["cresidencia"] . "' >" . $_POST["cresidencia1"] . "  ";
                                    }
                                    ?>
                                    </option>
                                    <?php
                                    $sql = "SELECT * from Ciudad";
                                    $res = sqlsrv_query($con, $sql);

                                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                                        echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputca"><span class="font-weight-bold">Ciu nacimiento</span></label>
                                <select name="cnacimiento" id="inputcnaci" class="form-control" placeholder="seleccione">

                                    <?php
                                    if (empty($_POST["cnacimiento"])) {
                                        echo "<option value=''> seleccione->";
                                        # code...
                                    } else {
                                        echo "<option value='" . $_POST["cnacimiento"] . "' >" . $_POST["cnacimiento1"] . "  ";
                                    }
                                    ?> </option>

                                    <?php
                                    $sql = "SELECT * from Ciudad";
                                    $res = sqlsrv_query($con, $sql);

                                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                                        echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inpu"><span class="font-weight-bold">Fec ingreso</span></label>
                                <input type="date" value="<?php echo $_POST["fingreso"]; ?>" class="form-control " id="inputfingreso" name="fingreso" placeholder="fingreso" <?php echo 'max=' . date('Y-m-d') ?>>
                            </div>

                            <div class="form-group col-md-2 ">
                                <label for="inputtel"><span class="font-weight-bold">Telefono</span></label>
                                <input name="telefono" type="number" value="<?php echo $_POST["telefono"]; ?>" class="form-control" id="inputTel" placeholder="#telefono" min="1000000" max="999999999999" minlength="7" maxlength="12">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputcontact"><span class="font-weight-bold">Nom contacto</span></label>
                                <input name="contacto" type="text" value="<?php echo $_POST["contacto"]; ?>" class="form-control" id="inputA" placeholder="Primer y segundo apellido" minlength="3" maxlength="30">
                            </div>



                        </div>
                        <div class="form-row">



                            <div class="form-group col-md-2">
                                <label for="inputcontactphone"><span class="font-weight-bold">Tel contacto</span></label>
                                <input name="telefonoc" type="number" value="<?php echo $_POST["telefonoc"]; ?>" class="form-control" id="inputTelc" placeholder="#tel contacto" minlength="7" maxlength="12">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputRh"><span class="font-weight-bold">RH</span></label>
                                <select name="rhsanguineo" value="" id="inputrole" class="form-control">

                                    <?php
                                    if (empty($_POST["rhsanguineo"])) {
                                        echo "<option value=''> seleccione->";
                                        # code...
                                    } else {
                                        echo " <option value='" . $_POST["rhsanguineo"] . "'> " . $_POST["rhsanguineo"] . "";
                                    }

                                    ?>

                                    </option>
                                    <option value="O+">o+</option>
                                    <option value="O-">o-</option>
                                    <option value="a+">a+</option>
                                    <option value="a-">a-</option>
                                    <option value="ab-">ab-</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputState"><span class="font-weight-bold">T documento</span></label>
                                <select name="idTipoDoc" id="inputDoctype" class="form-control">
                                    <?php
                                    if (empty($_POST["idTipoDoc"])) {

                                        echo "<option value=''> seleccione--> ";
                                        # code...
                                    } else {
                                        echo "<option value='" . $_POST["idTipoDoc"] . "'>" . $_POST["descdoc"] . " ";
                                    }
                                    ?>
                                    </option>
                                    <option value="1">cedula de ciudadania</option>
                                    <option value="2">tarjeta de identidad</option>
                                    <option value="3">cedula extranjero</option>

                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="inputmtransport"><span class="font-weight-bold">Transporte</span></label>
                                <select name="medtransporte" id="inputmtrans" class="form-control">
                                    <?php
                                    if (empty($_POST["medtransporte"])) {

                                        echo "<option value=''> seleccione--> ";
                                        # code...
                                    } else {
                                        echo "<option value='" . $_POST["medtransporte"] . "'>" . $_POST["medtransporte"] . " ";
                                    }
                                    ?>
                                    </option>
                                    <option value="Publico automotor">Publico automotor</option>
                                    <option value="Privado automotor">Privado automotor</option>
                                    <option value="Publico metro">Publico metro</option>


                                </select>

                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputAddress"><span class="font-weight-bold">Direccion</span></label>
                                <input name="direccion" value="<?php echo $_POST["direccion"]; ?>" type="text" class="form-control" id="inputdireccion" placeholder="calle falsa 123" minlength="5" maxlength="30">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputgender"><span class="font-weight-bold">Genero</span></label>
                                <select name="genero" id="inputgender" class="form-control">
                                    <?php
                                    if (empty($_POST["genero"])) {

                                        echo "<option value=''> seleccione--> ";
                                        # code...
                                    } else {
                                        echo "<option value='" . $_POST["genero"] . "'>" . $_POST["genero"] . " ";
                                    }
                                    ?>
                                    </option>
                                    <option value="masculino">masculino</option>
                                    <option value="femenino">femenino</option>
                                    <option value="otro">otro</option>


                                </select>
                            </div>



                        </div>





                        <div class="form-row">

                            <div class="col-4"></div>
                            <div class="col">

                                <button type="button" onclick="cruduser('guardar')" class="btn btn-verde text-light">
                                    REGISTRAR </button> <br>
                                <br>



                            </div>
                            <div class="col">

                                <button type="button" onclick="cruduser('actualizar')" class="btn btn-verde text-light">
                                    ACTUALIZAR </button> <br>

                                <article id="alerta" class="alert-warning text-danger"></article>

                            </div>


                            <div class="col-4">



                            </div>

                        </div>

                        <div class="form-row-12">
                            <mark> <a href="cerrarsesion.php" class="text-danger font-size:1rem">Cerrar sesion</a> </mark>
                            <!-- <?php

                                    var_dump($_POST["rhsanguineo"]); ?> -->
                        </div>


                    </form>



                </section>




            </div>


            <div class="container mt-5 col-10 ">
                <div class="container formulario1 imgs p-4">
                    <table id="tusuarios" class="responsive  table-striped " width="100%" height="100%">
                        <thead class=" ">
                            <tr class=" text-center fverde  table text-light">
                                <th>Eliminar</th>
                                <th>Editar</th>
                                <th>Nombre</th>
                                <th>Documento</th>
                                <th>Cargo</th>
                                <th>Telefono</th>
                                <th>Contacto</th>
                                <th>tel cont</th>
                                <th>Rh</th>
                                <th>Direccion</th>



                                <th>T.doc</th>
                                <th>Fnaci</th>
                                <th>C.natal</th>
                                <th>reside</th>
                                <th>Med.trans</th>
                                <th>Genero</th>
                                <th>Fecha.ing</th>


                            </tr>
                        </thead>
                        <tbody>


                            <?php

                            if (isset($_GET['eliminar'])) {

                                $sqlDelete = "exec borrar ?";
                                $datos = array(
                                    array($_GET['id'], SQLSRV_PARAM_IN),
                                );
                                $resu = sqlsrv_query($con, $sqlDelete, $datos);


                                while ($row = sqlsrv_fetch_array($resu)) {


                                    if ($row[0] != 'error') {
                                        echo "<label class='text-danger' >usuario eliminado correctamente</label>";
                                    } else {
                                        echo "<label class='text-danger' >usuario admin,no se puede eliminar</label>";
                                    }
                                }
                            }


                            $sql = "	
                    select id,nombre,cedula as documento,descripcion,idtipodoc,fnacimiento,nomCiudad as lnacimineto,idciudad,cargo,tel,contactp,telconta,nomCiudad as lresidencia,direccion,rh,mtransporte,genero,fechaing from usuarios u 
                    inner join TipoDocumento on tipodoc= idtipodoc
                    inner join Ciudad on ciudadn = idciudad";


                            $res = sqlsrv_query($con, $sql);




                            while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                                echo "<tr class='text-center texto ' >
                        <td>  <a href='#' class='btn btn-danger' onclick='confirmDelete(" . $row["id"] . ");'>Eliminar</button></td>
                        <td>
                        <form action='' method='POST'>

                       <input type='hidden' name='nombre' value='" . $row["nombre"] . "'>
                       <input type='hidden' name='cedula' value='" . $row["documento"] . "'>
                       <input type='hidden' name='cargo' value='" . $row["cargo"] . "'>
                       <input type='hidden' name='telefono' value='" . $row["tel"] . "'>
                       <input type='hidden' name='contacto' value='" . $row["contactp"] . "'>
                       <input type='hidden' name='telefonoc' value='" . $row["telconta"] . "'>
                       <input type='hidden' name='rhsanguineo' value='" . $row["rh"] . "'>
                       <input type='hidden' name='direccion' value='" . $row["direccion"] . "'>
                       <input type='hidden' name='idTipoDoc' value='" . $row["idtipodoc"] . "'>
                       <input type='hidden' name='fnacimiento' value='" . $row["fnacimiento"]->format('Y-m-d') . "'>
                       <input type='hidden' name='cnacimiento' value='" . $row["idciudad"] . "'>
                       <input type='hidden' name='cresidencia' value='" . $row["idciudad"] . "'>
                       <input type='hidden' name='medtransporte' value='" . $row["mtransporte"] . "'>
                       <input type='hidden' name='genero' value='" . $row["genero"] . "'>
                       <input type='hidden' name='fingreso' value='" . $row["fechaing"]->format('Y-m-d') . "'>
                       <input type='hidden' name='cnacimiento1' value='" . $row["lnacimineto"] . "'>
                       <input type='hidden' name='cresidencia1' value='" . $row["lresidencia"] . "'>
                       <input type='hidden' name='descdoc' value='" . $row["descripcion"] . "'>

                       <input class='btn btn-success' type='submit'  value='Editar' name='accion'>
                       </form>
                    
                       </td>
                       
                            <td>" . $row["nombre"] . "</td>
                            <td>" . $row["documento"] . "</td>
                            <td>" . $row["cargo"] . "</td>
                            <td>" . $row["tel"] . "</td>
                            <td>" . $row["contactp"] . "</td>
                            <td>" . $row["telconta"] . "</td>
                            <td>" . $row["rh"] . "</td>
                            <td>" . $row["direccion"] . "</td>

                           
                            <td>" . $row["descripcion"] . "</td>
                            <td>" . $row["fnacimiento"]->format('Y-m-d') . "</td>
                            <td>" . $row["lnacimineto"] . "</td>
                            <td>" . $row["lresidencia"] . "</td>
                           
                            <td>" . $row["mtransporte"] . "</td>
                            <td>" . $row["genero"] . "</td>
                            <td>" . $row["fechaing"]->format('Y-m-d') . "</td>
                            </tr>";



                                // echo $row["nombre"];
                            }




                            ?>

                </div>


                </tbody>


                </table>
            </div>

        </div>

    </div>







</body>


</html>