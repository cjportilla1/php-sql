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
                            <a href="#">Page 1</a>
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
        <div class="container text-center imgs mt-2  formulario1 p-5">

           
            <h1 class="verde titulos ">Usuarios internos empresas</h1>



       





                <form class="" action="" method="POST" id="formRegistroUser" ectype="multipart/form-data">


                    <div class="form-row">
                        <div class="form-group col">
                            <label for=""><span class="font-weight-bold">Razon social</span></label>
                            <input name="razon" type="text" class="form-control" id="nombreid" placeholder="Nombre" minlength="3" maxlength="40" value="<?php echo $_POST["razon"]; ?>">
                        </div>

                        <div class="form-group col">
                            <label for="inputd"><span class="font-weight-bold">Usuario</span></label>
                            <input name="usuario" type="text" class="form-control" id="inputdoc" placeholder="#Cedula"  minlength="7" maxlength="12" value="<?php echo $_POST["usuario"]; ?>">
                        </div>



                    </div>

                    <div class="form-row">


                                    
                        <div class="form-group col">
                            <label for="inputd"><span class="font-weight-bold">Contraseña</span></label>
                            <input name="contrasena" type="text" class="form-control" id="inputdoc" placeholder="#Cedula"  minlength="7" maxlength="12" value="<?php echo $_POST["contrasena"]; ?>">
                        </div>

                            
                        <div class="form-group col">
                            <label for="inputca"><span class="font-weight-bold">Rol</span></label>
                            <select name="idrol" id="inputcargo" class="form-control">
                                <?php
                                if (empty($_POST["idrol"])) {

                                    echo "<option value=''> seleccione--> ";
                                    # code...
                                } else {
                                    echo "<option value='" . $_POST["idrol"] . "'>" . $_POST["rol"] . " ";
                                }
                                ?>
                                <option value="Administrador">Administrador</option>
                                <option value="Visualizacion">Visualizacion</option>
                             



                            </select>
                        </div>

                        

                    </div>
                   





                    <div class="form-row">

                       
                        <div class="col">

                            <button type="button" onclick="cruduser('guardaruint')" class="btn btn-verde text-light">
                                REGISTRAR </button> <br>
                            <br>



                        </div>
                        <div class="col">

                            <button type="button" onclick="cruduser('actualizaruint')" class="btn btn-verde text-light">
                                ACTUALIZAR </button> <br>

                            <article id="alerta" class="alert-warning text-danger"></article>

                        </div>


                       

                    </div>

                    <div class="form-row-12">
                        <mark> <a href="cerrarsesion.php" class="text-danger font-size:1rem">Cerrar sesion</a> </mark>
                     
                    </div>


                </form>



    




        </div>


        <div class="container mt-5  ">
            <div class="container formulario1 imgs p-5">
                <table id="tusuarios" class="responsive  table-striped " width="100%" height="100%">
                    <thead class=" ">
                        <tr class=" text-center fverde   text-light">
                            <th>Eliminar</th>
                            <th>Editar</th>
                            <th>Razon social</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                         
                          


                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        if (isset($_GET['eliminar'])) {

                            $sqlDelete = "delete from Usersint where iduint=".$_GET["id"]."";
                            $datos = array(
                                array($_GET['id'], SQLSRV_PARAM_IN),
                            );
                            $resu = sqlsrv_query($con, $sqlDelete, $datos);


                            while ($row = sqlsrv_fetch_array($resu)) {


                                if ($row[0]) {
                                    echo "<label class='text-danger' >usuario eliminado correctamente</label>";
                                } else {
                                    echo "<label class='text-danger' >usuario admin,no se puede eliminar</label>";
                                }
                            }
                        }


                        $sql = "	
                        select iduint,razons,usuarioint,passuint,roluint,descrol from Usersint ui 
                            inner join Roluint on roluint=idroluint";


                        $res = sqlsrv_query($con, $sql);




                        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                            echo "<tr class='text-center texto ' >
                        <td>  <a href='#' class='btn btn-danger' onclick='confirmDeleteUint(" . $row["iduint"] . ");'>Eliminar</button></td>
                        <td>
                        <form action='' method='POST'>

                       <input type='hidden' name='razon' value='" . $row["razons"] . "'>
                       <input type='hidden' name='usuario' value='" . $row["usuarioint"] . "'>
                       <input type='hidden' name='contrasena' value='" . $row["passuint"] . "'>
                       <input type='hidden' name='idrol' value='" . $row["roluint"] . "'>
                       <input type='hidden' name='rol' value='" . $row["descrol"] . "'>
                   

                       <input class='btn btn-success' type='submit'  value='Editar' name='accion'>
                       </form>
                    
                       </td>
                       
                            <td>" . $row["razons"] . "</td>
                            <td>" . $row["usuarioint"] . "</td>
                            <td>" . $row["passuint"] . "</td>
                           
                            <td>" . $row["descrol"] . "</td>
                         
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