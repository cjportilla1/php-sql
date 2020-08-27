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


	if ($_POST['btnopcion']=='guardaruint') {

		 


		$razons =trim($_POST['razon']);
		$usuarioint =trim($_POST['usuarioint']);
		$contra =trim($_POST['contrasena']);
		$idrol =trim($_POST['idrole']);
	
		
	

		$sql = "exec sp_reguint ?,?,?,?";
		$datos = array(
			array($razons, SQLSRV_PARAM_IN),
			array($usuarioint, SQLSRV_PARAM_IN),
			array($contra, SQLSRV_PARAM_IN),
			array($idrol, SQLSRV_PARAM_IN),
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "datos guardados correctamente";

				
			 
			} else {
				echo "error al guardar,campos vacios o registro repetido";
			}
		}
	}


	if ($_POST['btnopcion']=='actualizaruint') {

		 


		$razons =trim($_POST['razon']);
		$usuarioint =trim($_POST['usuarioint']);
		$contra =trim($_POST['contrasena']);
		$idrol =trim($_POST['idrole']);
	
		
	

		$sql = "exec sp_actusint ?,?,?,?";
		$datos = array(
			array($razons, SQLSRV_PARAM_IN),
			array($usuarioint, SQLSRV_PARAM_IN),
			array($contra, SQLSRV_PARAM_IN),
			array($idrol, SQLSRV_PARAM_IN),
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "datos actualizados correctamente";

				
			 
			} else {
				echo "error al actualizar";
			}
		}
	}




	if ($_POST['btnopcion']=='guardartrbot') {

		 


		$ftranbot =trim($_POST['ftranbot']);
		$idperstr =trim($_POST['idperstr']);
		$idcliente =trim($_POST['idcliente']);
		$idcat =trim($_POST['idcat']);
		$transl =trim($_POST['transl']);
		$transexi =trim($_POST['transexi']);
		$tiahorrado =trim($_POST['tiahorrado']);
	
	
		
	

		$sql = "exec usp_insBotTr ?,?,?,?,?,?,?";
		$datos = array(
			array($ftranbot, SQLSRV_PARAM_IN),
			array($idperstr, SQLSRV_PARAM_IN),
			array($idcliente, SQLSRV_PARAM_IN),
			array($idcat, SQLSRV_PARAM_IN),
			array($transl, SQLSRV_PARAM_IN),
			array($transexi, SQLSRV_PARAM_IN),
			array($tiahorrado, SQLSRV_PARAM_IN),
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "transaccion guardada correctamente";

				
			 
			} else {
				echo "no se permiten campos vacios o registros repetidos entre cliente y categoria";
			}
		}
	}


