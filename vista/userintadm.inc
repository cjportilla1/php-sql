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
                            <input name="usuarioint" type="text" class="form-control" id="inputdoc" placeholder="ejemplo@mail.com" minlength="7" maxlength="40" value="<?php echo $_POST["usuario"]; ?>">
                        </div>



                    </div>

                    <div class="form-row">



                        <div class="form-group col">
                            <label for="inputd"><span class="font-weight-bold">Contraseña</span></label>
                            <input name="contrasena" type="text" class="form-control" id="inputdoc" placeholder="contraseña" minlength="8" maxlength="30" value="<?php echo $_POST["contrasena"]; ?>">
                        </div>


                        <div class="form-group col">
                            <label for="inputca"><span class="font-weight-bold">Rol</span></label>
                            <select name="idrole" id="inputcargo" class="form-control">
                                <?php
                                if (empty($_POST["idrol"])) {

                                    echo "<option value=''> seleccione--> ";
                                    # code...
                                } else {
                                    echo "<option value='" . $_POST["idrol"] . "'>" . $_POST["rol"] . " ";
                                }
                                ?>
                                <option value="1">Administrador</option>
                                <option value="2">Visualizacion</option>




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
                        <mark> <a href="cerrarsesion.php" class="text-danger btn btn-warning font-size:1rem">Cerrar sesion</a> </mark>

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

                                $sqlDelete = "delete from Usersint where iduint=" . $_GET["id"] . "";
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



                            }




                            ?>

                </div>


                </tbody>


                </table>
            </div>