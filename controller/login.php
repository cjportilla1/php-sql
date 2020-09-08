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


        // print_r($row["nombreadt"]);
        
        switch ($row["nombreadt"]) {
            case 'admin':

                $_SESSION["perf"]='admin';
                $_SESSION["logged"]=1;
                echo "1";
                # code...
                break;

         case 'visual':

            $_SESSION["perf"]='visualizacion';
            $_SESSION["logged"]=1;
            echo "1";
                    # code...
                    break;
            
            case 'error':
                $_SESSION["perf"]='null';
                $_SESSION["logged"]='null';
                echo " error , datos incorrectos";
                # code...
                break;

                case 'camilo':
                    $_SESSION["perf"]='camilo';
                    $_SESSION["logged"]=1;
                    echo "1";
                    # code...
                    break;
        }
      
    }
 

	}


?>