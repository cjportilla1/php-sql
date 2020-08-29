 <div class="container col-10 text-center imgs mt-2  formulario1">


     <h1 class="verde titulos ">Registros Consumos Historicos</h1>



     <section class="row justify-content-center p-4">





         <form class="" action="" method="POST" id="formRegistroUser" ectype="multipart/form-data">


             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="inpu"><span class="font-weight-bold">Fecha de entrega consumos historicos</span></label>
                     <input type="date" value="<?php echo $_POST["fechachist"]; ?>" class="form-control " id="inputfingreso" name="fechachist" placeholder="fingreso" <?php echo 'max="' . date('Y-m-d') . '"' ?>>
                 </div>

                 <div class="form-group col-md-6">
                     <label for="inputca"><span class="font-weight-bold">Historico gestionado por</span></label>
                     <select name="idperso" id="inputcargo" class="form-control">
                         <?php
                            if (empty($_POST["idperso"])) {

                                echo "<option value=''> seleccione--> ";
                                # code...
                            } else {
                                echo "<option value='" . $_POST["idperso"] . "'>" . $_POST["namech"] . " ";
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




             </div>
             <div class="form-row">



                 <div class="form-group col-md-6">
                     <label for="inputtel"><span class="font-weight-bold">Cantidad suscripciones a las que se le hicieron historicos</span></label>
                     <input name="cantsusch" type="number" value="<?php echo $_POST["cantsusch"]; ?>" class="form-control" id="inputTel" placeholder="#cantidad de suscripciones" min="1" max="100">
                 </div>



                 <div class="form-group col-md-6">
                     <label for="inputca"><span class="font-weight-bold">Cliente al que se le hicieron regristros de Consumos historicos </span></label>
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


                 <div class="col-6">

                     <button type="button" onclick="cruduser('guardarch')" class="btn btn-verde text-light titulos">
                         REGISTRAR </button> <br>
                     <br>



                 </div>
                 <div class="col-6">

                     <button type="button" onclick="cruduser('actualizarch')" class="btn btn-verde text-light titulos">
                         ACTUALIZAR </button> <br>

                     <article id="alerta" class="alert-warning text-danger"></article>

                 </div>




             </div>

             <div class="form-row-12">
                 <mark> <a href="cerrarsesion.php" class="text-danger btn btn-warning">Cerrar sesion</a> </mark>
                 <?php

                    if (empty($_POST["idconsumo"])) {
                        echo '<input type="hidden" name="idconsumo" value="0">';

                        # code...
                    } elseif (!empty($_POST["idconsumo"])) {
                        echo '<input type="hidden" name="idconsumo" value="' . $_POST["idconsumo"] . '">';
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
                     <th>Gestionado por</th>
                     <th>fecha ingreso consumos his</th>
                     <th>cliente al cual se le ingresaron</th>
                     <th>cant consumos historicos</th>







                 </tr>
             </thead>
             <tbody>


                 <?php

                    if (isset($_GET['eliminar'])) {

                        $sqlDelete = "delete from Chistorico where idConsumo=?";
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
                    select ch.idConsumo,ch.idPerso,nombre,ch.fechaChist,ch.idCliente,c.nomCliente,ch.canSusch from Chistorico ch
inner join usuarios  on ch.idPerso=id
inner join  Cliente c on ch.idCliente=c.idCliente";


                    $res = sqlsrv_query($con, $sql);




                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                        echo "<tr class='text-center texto ' >
                        <td>  <a href='#' class='btn btn-danger' onclick='confirmDeleteCH(" . $row["idConsumo"] . ");'>Eliminar</button></td>
                        <td>
                        <form action='' method='POST'>

                    <input type='hidden' name='idconsumo' value='" . $row["idConsumo"] . "'>
                    <input type='hidden' name='namech' value='" . $row["nombre"] . "'>
                       <input type='hidden' name='idperso' value='" . $row["idPerso"] . "'>
                       <input type='hidden' name='fechachist' value='" . $row["fechaChist"]->format('Y-m-d')  . "'>
                       <input type='hidden' name='idcliente' value='" . $row["idCliente"] . "'>
                       <input type='hidden' name='nomcliente' value='" . $row["nomCliente"] . "'>
                       <input type='hidden' name='cantsusch' value='" . $row["canSusch"] . "'>
                      
                       <input class='btn btn-success' type='submit'  value='Editar/act' name='accion'>
                       </form>
                    
                       </td>
                       
                     
                        
                            <td>" . $row["nombre"] . "</td>
                            <td>" . $row["fechaChist"]->format('Y-m-d') . "</td>
                            <td>" . $row["nomCliente"] . "</td>
                           
                    
                            <td>" . $row["canSusch"] . "</td>
                         
                            
                         
                            </tr>";
                    }




                    ?>

     </div>


     </tbody>


     </table>
 </div>