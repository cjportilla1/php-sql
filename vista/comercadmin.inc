 <div class="container col-10 text-center imgs mt-2  formulario1">


     <h1 class="verde titulos ">Comercializadores</h1>



     <section class="row justify-content-center p-2">





         <form class="" action="" method="POST" id="formRegistroUser" ectype="multipart/form-data">


             <div class="form-row">
                 <div class="form-group col-md-3">
                 <label for="inputgender"><span class="font-weight-bold">Comercializador</span></label>
                                <select name="idnomcom" id="inputServcomer" class="form-control">
                                    <?php
                                    if (empty($_POST["idnomcom"])) {

                                        echo "<option value=''> Seleccione--> ";
                                        # code...
                                    } else {
                                        echo "<option value='" . $_POST["idnomcom"] . "'>" . $_POST["nomcomer"] . " ";
                                    }
                                    ?>
                                    </option>
                                    
                                    <?php
                                    $sql = "SELECT * from Nom_Comerci";
                                    $res = sqlsrv_query($con, $sql);

                                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                                        echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                    }
                                    ?>
     
                                </select>
                 </div>
                 <div class="form-group col-md-3">
                 <label for="inputgender"><span class="font-weight-bold">Servicio</span></label>
                                <select name="servicom" id="inputServcomer" class="form-control">
                                    <?php
                                    if (empty($_POST["servicom"])) {

                                        echo "<option value=''> Seleccione--> ";
                                        # code...
                                    } else {
                                        echo "<option value='" . $_POST["servicom"] . "'>" . $_POST["servicom"] . " ";
                                    }
                                    ?>
                                    </option>
                                    <option value="Energía">Energía</option>
                                    <option value="Acueducto">Acueducto</option>
                                    <option value="Gas">Gas</option>
                                    <option value="Energía/Acueducto">Energía/Acueducto</option>
                                    <option value="Energía/Gas">Energía/Gas</option>
                                    <option value="Gas/Acueducto">Gas/Acueducto</option>
                                    <option value="Energía/Gas/Acueducto">Energía/Gas/Acueducto</option>

                    


                                </select>
                 </div>

                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold">Cuenta</span></label>
                     <input name="cuentacom" type="text" value="<?php echo $_POST["cuentacom"]; ?>" class="form-control" id="inputTel" placeholder="Cuenta" min="1" max="100">
                 </div>

                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold">Nota</span></label>
                     <input name="notacom" type="text" value="<?php echo $_POST["notacom"]; ?>" class="form-control" id="inputTel" placeholder="Nota" min="1" max="100">
                 </div>

               

             </div>
             <div class="form-row">

             <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold">Clave</span></label>
                     <input name="clavecom" type="text" value="<?php echo $_POST["clavecom"]; ?>" class="form-control" id="inputpasscomer" placeholder="Clave" min="1" max="100">
                 </div>

                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold">Link</span></label>
                     <input name="linkcom" type="text" value="<?php echo $_POST["linkcom"]; ?>" class="form-control" id="inputTel" placeholder="https:// empresa.com" min="1" max="100">
                 </div>



                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold">Correo</span></label>
                     <input name="correocom" type="text" value="<?php echo $_POST["correocom"]; ?>" class="form-control" id="inputTel" placeholder="ejemplo@mail.com" min="1" max="100">
                 </div>



                 <div class="form-group col-md-3">
                     <label for="inputtel"><span class="font-weight-bold">Telefono</span></label>
                     <input name="telecom" type="text" value="<?php echo $_POST["telecom"]; ?>" class="form-control" id="inputTel" placeholder="2222222" min="1" max="100">
                 </div>






             </div>






             <div class="form-row">

                 <div class="col-2"> </div>
                 <div class="col">

                     <button type="button" onclick="cruduser('guardarcomer')" class="btn btn-verde text-light titulos">
                         REGISTRAR </button> <br>
                     <br>

                 </div>
                 <div class="col">

                     <button type="button" onclick="cruduser('actualizarcomer')" class="btn btn-verde text-light titulos">
                         ACTUALIZAR </button> <br>

                     <article id="alerta" class="alert-warning text-danger"></article>

                 </div>


                 <div class="col-2"> </div>

             </div>

             <div class="form-row-12">
                 <mark> <a href="cerrarsesion.php" class="text-danger btn btn-warning">Cerrar sesion</a> </mark>
                 <?php

                    if (empty($_POST["idcomer"])) {
                        echo '<input type="hidden" name="idcomer" value="0">';

                        # code...
                    } elseif (!empty($_POST["idcomer"])) {
                        echo '<input type="hidden" name="idcomer" value="' . $_POST["idcomer"] . '">';
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
                     <th>Comercializador</th>
                     <th>Servicio</th>
                     <th>Nota</th>
                     <th>Cuenta</th>
                     
                     <th>Link</th>
                     <th>Correo</th>
                     <th>Telefono</th>







                 </tr>
             </thead>
             <tbody>


                 <?php

                    if (isset($_GET['eliminar'])) {

                        $sqlDelete = "delete from Chistorico where idComerc=?";
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
                    select idComerc,idnomCom,nomComer,serviCom,notaCom,cuentaCom,claveCom,linkCom,correoCom,teleCom  from Comercializador 
                    inner join Nom_Comerci on idnomCom=idNomComer";


                    $res = sqlsrv_query($con, $sql);




                    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_BOTH)) {
                        echo "<tr class='text-center texto ' >
                        <td>  <a href='#' class='btn btn-danger' onclick='confirmDeleteCH(" . $row["idComerc"] . ");'>Eliminar</button></td>
                        <td>
                        <form action='' method='POST'>
                        <input type='hidden' name='idcomer' value='" . $row["idComerc"] . "'>
                         <input type='hidden' name='idnomcom' value='" . $row["idnomCom"] . "'>
                         <input type='hidden' name='nomcomer' value='" . $row["nomComer"] . "'>
                        <input type='hidden' name='servicom' value='" . $row["serviCom"] . "'>
                       <input type='hidden' name='notacom' value='" . $row["notaCom"] . "'>
                      
                       <input type='hidden' name='cuentacom' value='" . $row["cuentaCom"] . "'>
                       <input type='hidden' name='clavecom' value='" . $row["claveCom"] . "'>
                       <input type='hidden' name='linkcom' value='" . $row["linkCom"] . "'>
                       <input type='hidden' name='correocom' value='" . $row["correoCom"] . "'>
                       <input type='hidden' name='telecom' value='" . $row["teleCom"] . "'>
                      
                       <input class='btn btn-success' type='submit'  value='Editar/act' name='accion'>
                       </form>
                    
                       </td>
                       
                     
                        
                            <td>" . $row["nomComer"] . "</td>
                            <td>" . $row["serviCom"] . "</td>
                            <td>" . $row["notaCom"] . "</td>
                            <td>" . $row["cuentaCom"] . "</td>
                       
                            <td>" . $row["linkCom"] . "</td>
                            <td>" . $row["correoCom"] . "</td>
                            <td>" . $row["teleCom"] . "</td>
                         
                            </tr>";
                    }




                    ?>

     </div>


     </tbody>


     </table>
 </div>