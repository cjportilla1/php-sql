 <nav class="navbar navbar-expand-lg navbar-light ">

     <div class="container-fluid">

         <button type="button" id="sidebarCollapse" class="btn btn-info">
             <i class="fas fa-align-left"></i>
             <span>Menú</span>
         </button>

     </div>

 </nav>
 <div class="container col-10 text-center imgs mt-2  formulario1 ">


     <h1 class="verde titulos ">Modelo de Gobierno</h1>



     <section class="row justify-content-center p-3 ">





         <form class="" action="" method="POST" id="formRegistroUser" ectype="multipart/form-data">


             <div class="form-row">
                 <div class="form-group col-md-3">
                     <label for="inputgender"><span class="font-weight-bold fenergy">Cliente</span></label>
                     <select name="idclien" id="inputServcomer" class="form-control">
                         <?php
                            if (empty($_POST["idclien"])) {

                                echo "<option value=''> Seleccione--> ";
                                # code...
                            } else {
                                echo "<option value='" . $_POST["idclien"] . "'>" . $_POST["nomcli"] . " ";
                            }
                            ?>
                         </option>

                         <?php
                            $sql = "select * from Cliente order by nomCliente asc";
                            $res = sqlsrv_query($con, $sql);

                            while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                                echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                            }
                            ?>

                     </select>
                 </div>
                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold">Nombre</span></label>
                     <input name="nommg" type="text" value="<?php echo $_POST["nommg"]; ?>" class="form-control" id="inputTel" placeholder="Nombre">
                 </div>


                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold fenergy">Correo</span></label>
                     <input name="correomg" type="email" value="<?php echo $_POST["correomg"]; ?>" class="form-control" id="inputTel" placeholder="ejemplo@mail.com">
                 </div>

                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold fenergy">Celular</span></label>
                     <input name="celularmg" type="number" value="<?php echo $_POST["celularmg"]; ?>" class="form-control" id="inputTel" placeholder="#Celular" min="1000000" max="999999999999">
                 </div>



             </div>
             <div class="form-row">

                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold fenergy">Telefono</span></label>
                     <input name="telfimg" type="number" value="<?php echo $_POST["telfimg"]; ?>" class="form-control" id="inputTel" placeholder="#Teléfono" min="1000000" max="999999999999">
                 </div>

                 <div class="form-group col-md-3">
                     <label for="inputgender"><span class="font-weight-bold fenergy">Regional</span></label>
                     <select name="idreg" id="inputServcomer" class="form-control">
                         <?php
                            if (empty($_POST["idreg"])) {

                                echo "<option value=''> Seleccione--> ";
                                # code...
                            } else {
                                echo "<option value='" . $_POST["idreg"] . "'>" . $_POST["nomreg"] . " ";
                            }
                            ?>
                         </option>

                         <?php
                            $sql = "select * from Tregional order by nomReg asc";
                            $res = sqlsrv_query($con, $sql);

                            while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                                echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                            }
                            ?>

                     </select>
                 </div>

                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold">Responsable</span></label>
                     <input name="respmg" type="text" value="<?php echo $_POST["respmg"]; ?>" class="form-control" id="inputTel" placeholder="Área responsable">
                 </div>



                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold fenergy">Observación</span></label>
                     <textarea name="observmg" type="text" class="form-control" id="inputTel" placeholder="observaciones"><?php echo $_POST["observmg"]; ?></textarea>
                 </div>






             </div>

             <div class="form-row mb-3">

             </div>





             <div class="form-row">

                 <div class="col-2"> </div>
                 <div class="col">

                     <button type="button" onclick="cruduser('guardarmg')" class="btn btn-verde text-light titulos">
                         REGISTRAR </button> <br>
                     <br>

                 </div>
                 <div class="col">

                     <button type="button" onclick="cruduser('actualizarmg')" class="btn btn-verde text-light titulos">
                         ACTUALIZAR </button> <br>

                     <article id="alerta" class="alert-warning text-danger"></article>

                 </div>


                 <div class="col-2"> </div>

             </div>

             <div class="form-row-12">
                 <mark> <a href="cerrarsesion.php" class="text-danger btn btn-warning">Cerrar sesion</a> </mark>
                 <?php

                    if (empty($_POST["idmogo"])) {
                        echo '<input type="hidden" name="idmogo" value="0">';

                        # code...
                    } elseif (!empty($_POST["idmogo"])) {
                        echo '<input type="hidden" name="idmogo" value="' . $_POST["idmogo"] . '">';
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
         <table id="tusuarios" class="responsive table-striped " width="100%">
             <thead class=" ">
                 <tr class=" text-center fverde fenergy  text-light">
                     <th>Eliminar</th>
                     <th>Editar</th>
                     <th>Cliente</th>
                     <th>Nombre</th>
                     <th>Correo</th>
                     <th>Celular</th>


                     <th>Tel fijo</th>
                     <th>Regional</th>
                     <th>Responsable</th>
                     <th>Observación</th>







                 </tr>
             </thead>
             <tbody>


                 <?php

                    if (isset($_GET['eliminar'])) {

                        $sqlDelete = "delete from tmod_Gob where idMg=?";
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
                    select idMg,idClien,nomCliente,nomMg,correoMg,celularMg,telfijoMg,idReg,nomReg,respMg,observMg from tmod_Gob  
                    inner join Cliente on idClien=idCliente
                    inner join Tregional on idReg=idRegional";


                    $res = sqlsrv_query($con, $sql);




                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {

                        switch ($row["idClien"]) {
                            case '1':
                                $cliente = "<IMG src='../assets/img/d1icon.ico' width='50%' height='30%'  >";
                                break;

                            case '2':
                                $cliente = "<IMG src='../assets/img/bbogota.ico' width='50%' height='30%'   >";
                                break;

                            case '3':
                                $cliente = "<IMG src='../assets/img/colanta.ico' width='50%' height='30%'    >";
                                break;

                            case '4':
                                $cliente = "<IMG src='../assets/img/velez.ico' width='50%' height='30%'    >";
                                break;

                            case '5':
                                $cliente = "<IMG src='../assets/img/studiof.ico' width='50%' height='30%'    >";
                                break;


                            case '11':
                                $cliente = "<IMG src='../assets/img/leonisa.ico' width='50%' height='30%'    >";
                                break;
                            default:
                                # code...
                                break;
                        }


                        echo "<tr class='text-center texto ' >
                        <td>  <a href='#' class='btn btn-rojo fenergy btn-sm' onclick='confirmDeleteMg(" . $row["idMg"] . ");'>Eliminar</button></td>
                        <td>
                        <form action='' method='POST'>
                        <input type='hidden' name='idmogo' value='" . $row["idMg"] . "'>
                        <input type='hidden' name='idclien' value='" . $row["idClien"] . "'>
                        <input type='hidden' name='nomcli' value='" . $row["nomCliente"] . "'>
                        <input type='hidden' name='nommg' value='" . $row["nomMg"] . "'>
                        <input type='hidden' name='correomg' value='" . $row["correoMg"] . "'>
                        <input type='hidden' name='celularmg' value='" . $row["celularMg"] . "'>
                       <input type='hidden' name='telfimg' value='" . $row["telfijoMg"] . "'>
                       <input type='hidden' name='idreg' value='" . $row["idReg"] . "'>
                       <input type='hidden' name='nomreg' value='" . $row["nomReg"] . "'>
                       <input type='hidden' name='respmg' value='" . $row["respMg"] . "'>
                       <input type='hidden' name='observmg' value='" . $row["observMg"] . "'>
                      
                      
                       <input class='btn btn-verde fenergy btn-sm' type='submit'  value='Editar/act' name='accion'>
                       </form>
                    
                       </td>
                       
                
                        
                            <td>" . $cliente . "</td>
                            <td>" . $row["nomMg"] . "</td>
                            <td>" . $row["correoMg"] . "</td>
                            <td>" . $row["celularMg"] . "</td>
                            <td>" . $row["telfijoMg"] . "</td>
                            <td>" . $row["nomReg"] . "</td>
                            <td>" . $row["respMg"] . "</td>
                            <td>" . $row["observMg"] . "</td>
                         
                            </tr>";
                    }




                    ?>



     </div>


     </tbody>


     </table>
 </div>