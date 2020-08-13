<?php  
	


	require('../vista/conexion.php');
	// $sql = "SELECT * FROM usuario";
	// $exe = $conectar->query($sql);

// error_reporting(0);

 		# code...
 		if ($_POST['btnopcion']=='guardar') {

		 


		$nombre =trim($_POST['nombre']);
		$documento =trim($_POST['cedula']);
		$fnacimiento  =$_POST['fnacimiento'];
		$ciudadr=$_POST['cresidencia'];
		$ciudadn =$_POST['cnacimiento'];
		$rol=$_POST['cargo'];
		$tel=$_POST['telefono'];
		$contacto =trim($_POST['contacto']); 
		$telconta =$_POST['telefonoc'];
		$rh =$_POST['rhsanguineo'];
		$idtipodoc =$_POST['idTipoDoc'];
		$mtransporte =$_POST['medtransporte'];
		$direccion =trim($_POST['direccion']);
		$genero =$_POST['genero'];
		$fingreso =$_POST['fingreso'];
		$pass='null';
		
	

		$sql = "exec sp_insertar ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
		$datos = array(
			array($nombre, SQLSRV_PARAM_IN),
			array($documento, SQLSRV_PARAM_IN),
			array($fnacimiento, SQLSRV_PARAM_IN),
			array($ciudadn, SQLSRV_PARAM_IN),
			array($rol, SQLSRV_PARAM_IN),
			array($tel, SQLSRV_PARAM_IN),
			array($contacto, SQLSRV_PARAM_IN),
			array($telconta, SQLSRV_PARAM_IN),
			array($idtipodoc, SQLSRV_PARAM_IN),
			array($ciudadr, SQLSRV_PARAM_IN),
			array($direccion, SQLSRV_PARAM_IN),
			array($rh, SQLSRV_PARAM_IN),
			array($mtransporte, SQLSRV_PARAM_IN),
			array($genero, SQLSRV_PARAM_IN),
			array($fingreso, SQLSRV_PARAM_IN),
			array($pass, SQLSRV_PARAM_IN)
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "datos registrados correctamente";
					
			 
			} else {
				echo "error , campos vacios,registro duplicado ó errores de datos";
			}
		}
	}

	if ($_POST['btnopcion']=='actualizar') {

		 


		$nombre =trim($_POST['nombre']);
		$documento =trim($_POST['cedula']);
		$fnacimiento  =$_POST['fnacimiento'];
		$ciudadr=$_POST['cresidencia'];
		$ciudadn =$_POST['cnacimiento'];
		$rol=$_POST['cargo'];
		$tel=$_POST['telefono'];
		$contacto =trim($_POST['contacto']); 
		$telconta =$_POST['telefonoc'];
		$rh =$_POST['rhsanguineo'];
		$idtipodoc =$_POST['idTipoDoc'];
		$mtransporte =$_POST['medtransporte'];
		$direccion =trim($_POST['direccion']);
		$genero =$_POST['genero'];
		$fingreso =$_POST['fingreso'];
		$pass='null';
		
	

		$sql = "exec sp_actualizar ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
		$datos = array(
			array($nombre, SQLSRV_PARAM_IN),
			array($documento, SQLSRV_PARAM_IN),
			array($fnacimiento, SQLSRV_PARAM_IN),
			array($ciudadn, SQLSRV_PARAM_IN),
			array($rol, SQLSRV_PARAM_IN),
			array($tel, SQLSRV_PARAM_IN),
			array($contacto, SQLSRV_PARAM_IN),
			array($telconta, SQLSRV_PARAM_IN),
			array($idtipodoc, SQLSRV_PARAM_IN),
			array($ciudadr, SQLSRV_PARAM_IN),
			array($direccion, SQLSRV_PARAM_IN),
			array($rh, SQLSRV_PARAM_IN),
			array($mtransporte, SQLSRV_PARAM_IN),
			array($genero, SQLSRV_PARAM_IN),
			array($fingreso, SQLSRV_PARAM_IN),
			array($pass, SQLSRV_PARAM_IN)
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "datos actualizados correctamente";

					unset($nombre,$documento,$rol,$tel,$contacto,$telconta,$rh,$direccion,$idtipodoc,$fnacimiento,$ciudadn,$ciudadr,$mtransporte,$genero,$fingreso);
			 
			} else {
				echo "error ,al actualizar,usuario no permitido ó error en algun campo";
			}
		}
	}