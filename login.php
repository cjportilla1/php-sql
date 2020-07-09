<!DOCTYPE html>
<?php
include("conexion.php");




    if (isset($_POST['sesion'])) {
            $user=$_POST['user'];
            $contra=$_POST['passuser'];

            $sql="exec usp_Login ?,?";
                $datos=array(
                array($user,SQLSRV_PARAM_IN),
                array($contra,SQLSRV_PARAM_IN)
            );
            // print_r($_POST);
            $res=sqlsrv_query($con,$sql,$datos);
             
          


            while($row = sqlsrv_fetch_array($res)) {
               
   

                if ($row[0]) {
                    
                    $_SESSION["logged"]=true;
                    header("location:formulario.php");
                
                }else{
                    echo "error de inicio de sesion";
                }
      
               
            }

        
    }






?>
<meta charset="UTF-8">
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width device.width, initial-scale=1">
    <title>php-sql</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\formulario.css">
</head>


<section class="container-fluid">
    <div class="row-12">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col mt-5">
                <form class="mt-5 formulario1" action="login.php"  method="POST" id="formLogin" >
                    <div class="container p-3">
                        <h3 class="naranja strong mb-4">Ingreso de admin</h3>
                        <div class="col">
                            <article id="resultado" class="alert-warning text-danger"></article>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario</label>
                            <input type="text" class="form-control" name="user" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" name="passuser">
                        </div>

                        <button type="submit" id="" class="btn btn-success " name="sesion"><svg class="bi bi-person-check-fill" width="2em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            </svg> Ingresar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
</section>