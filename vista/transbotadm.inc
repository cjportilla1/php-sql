 <div class="container col-10 text-center imgs mt-2  formulario1">


     <h1 class="verde titulos ">Registro transacciones del robot</h1>



     <section class="row justify-content-center p-4">





         <form class="" action="" method="POST" id="formRegistroUser" ectype="multipart/form-data">


             <div class="form-row">
                 <div class="form-group col-md-4">
                     <label for="inpu"><span class="font-weight-bold">Fec automatizacion</span></label>
                     <input type="date" value="<?php echo $_POST["ftranbot"]; ?>" class="form-control " id="inputfingreso" name="ftranbot" placeholder="fingreso" <?php echo 'max="' . date('Y-m-d') . '"' ?>>
                 </div>

                 <div class="form-group col-md-4">
                     <label for="inputca"><span class="font-weight-bold">Gestionado por</span></label>
                          <select name="idperstr" id="inputcargo" class="form-control">
                                 <?php
                            if (empty($_POST["idperstr"])) {

                                echo "<option value=''> seleccione--> ";
                                # code...
                            } else {
                                echo "<option value='" . $_POST["idperstr"] . "'>" . $_POST["name"] . " ";
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
                     <select name="idcliente" id="inputcargo" class="form-control">
                         <?php
                            if (empty($_POST["idcliente"])) {

                                echo "<option value=''> seleccione--> ";
                                # code...
                            } else {
                                echo "<option value='" . $_POST["idcliente"] . "'>" . $_POST["nomcliente"] . " ";
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
                     <label for="inputca"><span class="font-weight-bold">Cate transaccion</span></label>
                     <select name="idcat" id="inputcargo" class="form-control">
                         <?php
                            if (empty($_POST["idcat"])) {

                                echo "<option value=''> seleccione--> ";
                                # code...
                            } else {
                                echo "<option value='" . $_POST["idcat"] . "'>" . $_POST["descat"] . " ";
                            }
                            ?>
                         <?php
                            $sql = "SELECT * from Cat_Transaccion";
                            $res = sqlsrv_query($con, $sql);

                            while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                                echo '<option value="' . $row["idcattr"] . '">' . $row["desCat"] . '</option>';
                            }
                            ?>




                     </select>
                 </div>

                 <div class="form-group col-md-4">
                     <label for="inputtel"><span class="font-weight-bold">tr lanzadas</span></label>
                     <input name="transl" type="number" value="<?php echo $_POST["transl"]; ?>" class="form-control" id="inputTel" placeholder="#transacciones lanzadas" min="1" max="100">
                 </div>

                 <div class="form-group col-md-4">
                     <label for="inputtel"><span class="font-weight-bold">tr exitosas</span></label>
                     <input name="transexi" type="number" value="<?php echo $_POST["transexi"]; ?>" class="form-control" id="inputTel" placeholder="#transacciones exitosas" min="1" <?php if (empty($_POST["transl"])) {
                                                                                                                                                                                            echo ' max="20"';
                                                                                                                                                                                            # code...
                                                                                                                                                                                        } elseif (!empty($_POST["transl"])) {

                                                                                                                                                                                            echo ' max="' . $_POST["transl"] . '"';
                                                                                                                                                                                        }

                                                                                                                                                                                        ?>>
                 </div>


                 <div class="form-group col">
                     <label for="inputtel"><span class="font-weight-bold">tiempo ahorrado</span></label>
                     <input name="tiahorrado" type="number" value="<?php echo $_POST["tiahorrado"]; ?>" class="form-control" id="inputTel" placeholder="#tiempo ahorrado en horas" min="1" max="8">



                     </select>

                 </div>








             </div>






             <div class="form-row">


                 <div class="col-6">

                     <button type="button" onclick="cruduser('guardartrbot')" class="btn btn-verde text-light titulos">
                         REGISTRAR </button> <br>
                     <br>



                 </div>
                 <div class="col-6">

                     <button type="button" onclick="cruduser('actualizartrbot')" class="btn btn-verde text-light titulos">
                         ACTUALIZAR </button> <br>

                     <article id="alerta" class="alert-warning text-danger"></article>

                 </div>




             </div>

             <div class="form-row-12">
                 <mark> <a href="cerrarsesion.php" class="text-danger btn btn-warning">Cerrar sesion</a> </mark>
               <?php 

                    if (empty($_POST["idtranbot"])) {
                        echo'<input type="hidden" name="idtranbot" value="0">';

                        # code...
                    }elseif (!empty($_POST["idtranbot"])) {
                        echo '<input type="hidden" name="idtranbot" value="'. $_POST["idtranbot"].'">';
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
         <table id="tusuarios" class="responsive  table-striped " width="100%" height="100%">
             <thead class=" ">
                 <tr class=" text-center fverde   text-light">
                     <th>Eliminar</th>
                     <th>Editar</th>
                     <th>fec transaccion</th>
                     <th>realizado por</th>
                     <th>cliente</th>
                     <th>categoria</th>
                     <th>Tr lanzadas</th>
                     <th>Tr completadas</th>
                     <th>Tiempo ahorrado</th>







                 </tr>
             </thead>
             <tbody>


                 <?php

                    if (isset($_GET['eliminar'])) {

                        $sqlDelete = "delete from Transaccion_Robot where idtransaccion=?";
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
                            select idtransaccion,fechatr,idPerstr,nombre,idClientetr,nomCliente,idCategoriatr,desCat,botCantrl,botCantrs,tiAhorrado from Transaccion_Robot 
                            inner join usuarios on idPerstr=id
                            inner join Cliente on idClientetr=idCliente
                            inner join Cat_Transaccion on idCategoriatr=idcattr";


                    $res = sqlsrv_query($con, $sql);




                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                        echo "<tr class='text-center texto ' >
                        <td>  <a href='#' class='btn btn-danger' onclick='confirmDeleteTrBot(" . $row["idtransaccion"] . ");'>Eliminar</button></td>
                        <td>
                        <form action='' method='POST'>

                    <input type='hidden' name='idtranbot' value='" . $row["idtransaccion"]."'>
                       <input type='hidden' name='ftranbot' value='" . $row["fechatr"]->format('Y-m-d') . "'>
                       <input type='hidden' name='idperstr' value='" . $row["idPerstr"] . "'>
                       <input type='hidden' name='name' value='" . $row["nombre"] . "'>
                       <input type='hidden' name='idcliente' value='" . $row["idClientetr"] . "'>
                       <input type='hidden' name='nomcliente' value='" . $row["nomCliente"] . "'>
                       <input type='hidden' name='idcat' value='" . $row["idCategoriatr"] . "'>
                       <input type='hidden' name='descat' value='" . $row["desCat"] . "'>
                       <input type='hidden' name='transl' value='" . $row["botCantrl"] . "'>
                       <input type='hidden' name='transexi' value='" . $row["botCantrs"] . "'>
                       <input type='hidden' name='tiahorrado' value='" . $row["tiAhorrado"] . "'>
                       <input class='btn btn-success' type='submit'  value='Editar/act' name='accion'>
                       </form>
                    
                       </td>
                       
                     
                            <td>" . $row["fechatr"]->format('Y-m-d') . "</td>
                            <td>" . $row["nombre"] . "</td>
                            <td>" . $row["nomCliente"] . "</td>
                           
                            <td>" . $row["desCat"] . "</td>
                            <td>" . $row["botCantrl"] . "</td>
                            <td>" . $row["botCantrs"] . "</td>
                            <td>" . $row["tiAhorrado"] . "</td>
                            
                         
                            </tr>";
                    }




                    ?>

     </div>


     </tbody>


     </table>
 </div>