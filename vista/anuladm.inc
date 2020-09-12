<nav class="navbar navbar-expand-lg navbar-light ">

    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Menú</span>
        </button>

    </div>

</nav>
<div class="container col-10 text-center imgs mt-2  formulario1">


    <h1 class="verde titulos ">Registro Anulaciones</h1>



    <section class="row justify-content-center p-3">





        <form class="" action="" method="POST" id="formRegistroUser" ectype="multipart/form-data">


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inpu"><span class="font-weight-bold">Fecha anulación</span></label>
                    <input type="date" value="<?php echo $_POST["fechaanul"]; ?>" class="form-control " id="inputfingreso" name="fechaanul" placeholder="fingreso" <?php echo 'max="' . date('Y-m-d') . '"' ?>>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputca"><span class="font-weight-bold">Gestionado por</span></label>
                    <select name="idpersanul" id="inputcargo" class="form-control">
                        <?php
                        if (empty($_POST["idpersanul"])) {

                            echo "<option value=''> Seleccione--> ";
                            # code...
                        } else {
                            echo "<option value='" . $_POST["idpersanul"] . "'>" . $_POST["nameanul"] . " ";
                        }
                        ?>
                        <?php
                        $sql = "SELECT * from usuarios";
                        $res = sqlsrv_query($con, $sql);

                        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                            echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
                        }
                        ?>



                    </select>
                </div>


                <div class="form-group col-md-4">
                    <label for="inputca"><span class="font-weight-bold">Cliente</span></label>
                    <select name="idclienteanul" id="inputcargo" class="form-control">
                        <?php
                        if (empty($_POST["idclienteanul"])) {

                            echo "<option value=''> Seleccione--> ";
                            # code...
                        } else {
                            echo "<option value='" . $_POST["idclienteanul"] . "'>" . $_POST["clienteanul"] . " ";
                        }
                        ?>

                        <?php
                        $sql = "SELECT * from Cliente";
                        $res = sqlsrv_query($con, $sql);

                        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                            echo '<option value="' . $row["idCliente"] . '">' . $row["nomCliente"] . '</option>';
                        }
                        ?>




                    </select>
                </div>



            </div>
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="inputca"><span class="font-weight-bold">Motivo anulación</span></label>
                    <select name="idmotanul" id="inputcargo" class="form-control">
                        <?php
                        if (empty($_POST["idmotanul"])) {

                            echo "<option value=''> Seleccione--> ";
                            # code...
                        } else {
                            echo "<option value='" . $_POST["idmotanul"] . "'>" . $_POST["descrmotanul"] . " ";
                        }
                        ?>
                        <?php
                        $sql = "SELECT * from Mot_anula";
                        $res = sqlsrv_query($con, $sql);

                        while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                            echo '<option value="' . $row["idMotanul"] . '">' . $row["descrAnul"] . '</option>';
                        }
                        ?>




                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="inputtel"><span class="font-weight-bold">Cant fac anuladas</span></label>
                    <input name="cantfanul" type="number" value="<?php echo $_POST["cantfanul"]; ?>" class="form-control" id="inputTel" placeholder="#transacciones lanzadas" min="1" max="100">
                </div>

                <div class="form-group col-md-4">
                    <label for="inputca"><span class="font-weight-bold">Autorizado?</span></label>
                    <select name="autanul" id="inputcargo" class="form-control">

                        <?php
                        if (empty($_POST["autanul"])) {

                            echo "<option value=''> Seleccione--> ";
                            # code...
                        } else {
                            echo "<option value='" . $_POST["autanul"] . "'>" . $_POST["autanul"] . " ";
                        }
                        ?>
                        <option value="si">si</option>
                        <option value="no">no</option>

                    </select>

                </div>

















            </div>

            <div class="form-row text-center">
                <label for="inputtel"><span class="font-weight-bold">Observaciones</span></label>
                <textarea name="notaanul" type="text" class="form-control" id="inputTel" placeholder="observaciones"><?php echo $_POST["notaanul"]; ?></textarea>


            </div>

            <div class="form-row mb-2">
                <div class="col">

                    <label for="inputca"><span class="font-weight-bold">Error llegó al cliente?</span></label>
                    <select name="errcli" id="iderrcli" class="form-control">

                        <?php
                        if (empty($_POST["errcli"])) {

                            echo "<option value=''> Seleccione--> ";
                            # code...
                        } else {
                            echo "<option value='" . $_POST["errcli"] . "'>" . $_POST["errcli"] . " ";
                        }
                        ?>
                        <option value="si">si</option>
                        <option value="no">no</option>

                    </select>



                    <label for="inputtel"><span class="font-weight-bold">Plan de acción</span></label>
                    <textarea name="planacc" type="text" class="form-control" id="idplanacc" placeholder="Plan de accion"><?php echo $_POST["planacc"]; ?></textarea>

                </div>


            </div>






            <div class="form-row ">


                <div class="col-6">

                    <button type="button" onclick="cruduser('guardarAnul')" class="btn btn-verde text-light titulos">
                        REGISTRAR </button> <br>
                    <br>



                </div>
                <div class="col-6">

                    <button type="button" onclick="cruduser('actualizarAnul')" class="btn btn-verde text-light titulos">
                        ACTUALIZAR </button> <br>

                    <article id="alerta" class="alert-warning text-danger"></article>

                </div>




            </div>

            <div class="form-row-12">
                <mark> <a href="cerrarsesion.php" class="text-danger btn btn-warning">Cerrar sesion</a> </mark>
                <?php

                if (empty($_POST["idanulacion"])) {
                    echo '<input type="hidden" name="idanulacion" value="0">';

                    # code...
                } elseif (!empty($_POST["idanulacion"])) {
                    echo '<input type="hidden" name="idanulacion" value="' . $_POST["idanulacion"] . '">';
                    # code...
                }
                ?>

                <!-- <?php print_r($_SESSION); ?> -->
            </div>


        </form>



    </section>




</div>

<div class="container mt-5 col-12 ">
    <div class="container formulario1 imgs p-4">
        <table id="tusuarios" class="responsive table-striped " width="100%" height="100%">
            <thead class=" ">
                <tr class=" text-center fverde   text-light">
                    <th>Eliminar</th>
                    <th>Editar</th>
                    <th>Fecha anulación</th>
                    <th>Realizado por</th>
                    <th>Cliente</th>
                    <th>Cant fac anuladas</th>
                    <th>Motivo anulación</th>
                    <th>Error llegó al cliente?</th>
                    <th>Plan de accion:</th>
                    <th>Autorizada?</th>
                    <th>Observación</th>







                </tr>
            </thead>
            <tbody>


                <?php

                if (isset($_GET['eliminar'])) {

                    $sqlDelete = "delete from Anulacion where idAnulacion=?";
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
               select idAnulacion,idusrAn,U.nombre,feAnul,idClienteA,C.nomCliente,cantFanul,M.idMotanul,M.descrAnul,anulAut,NotaAn,cliErr,planAcc from Anulacion A 
               inner join usuarios U on idusrAn=id
               inner join Cliente C on idClienteA=c.idCliente
               inner join Mot_anula M on A.idMotanul=M.idMotanul";


                $res = sqlsrv_query($con, $sql);




                while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                    echo "<tr class='text-center textop ' >
                   <td>  <a href='#' class='btn btn-rojo btn-sm fenergy' onclick='confirmDeleteAnul(" . $row["idAnulacion"] . ");'>Eliminar</button></td>
                   <td>
                   <form action='' method='POST'>

               <input type='hidden' name='idanulacion' value='" . $row["idAnulacion"] . "'>
  
                  <input type='hidden' name='idpersanul' value='" . $row["idusrAn"] . "'>
                  <input type='hidden' name='nameanul' value='" . $row["nombre"] . "'>
                  <input type='hidden' name='fechaanul' value='" . $row["feAnul"]->format('Y-m-d')  . "'>
                  <input type='hidden' name='idclienteanul' value='" . $row["idClienteA"] . "'>
                  <input type='hidden' name='clienteanul' value='" . $row["nomCliente"] . "'>
                  <input type='hidden' name='cantfanul' value='" . $row["cantFanul"] . "'>
                  <input type='hidden' name='idmotanul' value='" . $row["idMotanul"] . "'>
                  <input type='hidden' name='descrmotanul' value='" . $row["descrAnul"] . "'>
                  <input type='hidden' name='autanul' value='" . $row["anulAut"] . "'>
                  <input type='hidden' name='notaanul' value='" . $row["NotaAn"] . "'>
                  <input type='hidden' name='errcli' value='" . $row["cliErr"] . "'>
                  <input type='hidden' name='planacc' value='" . $row["planAcc"] . "'>
                  <input class='btn btn-verde btn-sm fenergy' type='submit'  value='Editar/act' name='accion'>
                  </form>
               
                  </td>
                  
                
                       <td>" . $row["feAnul"]->format('Y-m-d') . "</td>
                       <td>" . $row["nombre"] . "</td>
                       <td>" . $row["nomCliente"] . "</td>
                       <td>" . $row["cantFanul"] . "</td>
                       <td>" . $row["descrAnul"] . "</td>
                       <td>" . $row["cliErr"] . "</td>
                       <td>" . $row["planAcc"] . "</td>
                       <td>" . $row["anulAut"] . "</td>
                       <td>" . $row["NotaAn"] . "</td>
                       
                    
                       </tr>";
                }




                ?>

    </div>


    </tbody>


    </table>
</div>