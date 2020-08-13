<?php  
  session_start();
	# Si oprimimos el boton de loginuser, vamos a validar el ingreso:
if (isset($_POST['btnlogin'])){
		# Incluyo la conexion a la base de datos:
	     // print_r($_POST);
    require('../vista/conexion.php');
    
  
        $user = trim($_POST['user']);
        $contra = trim($_POST['passuser']);
    
   

    $sql = "exec sp_Login ?,?";
    $datos = array(
        array($user, SQLSRV_PARAM_IN),
        array($contra, SQLSRV_PARAM_IN)
    );
    // print_r($_POST);
    $res = sqlsrv_query($con, $sql, $datos);




    while ($row = sqlsrv_fetch_array($res)) {



        if ($row[0]!='error') {

            $_SESSION["perf"] ='admin';
           echo "1";
        } else {
            echo "error de inicio de sesion,compruebe datos";
        }
    }
 

	}


?>