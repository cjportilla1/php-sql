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
		$computador=trim($_POST['computador']);
		$idemail =$_POST['idemail'];
		
	

		$sql = "exec sp_insertar ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
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
			array($computador, SQLSRV_PARAM_IN),
			array($idemail, SQLSRV_PARAM_IN)
			
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
		$computador=trim($_POST['computador']);
		$idemail =$_POST['idemail'];
		
	

		$sql = "exec sp_actualizar ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
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
			array($computador, SQLSRV_PARAM_IN),
			array($idemail, SQLSRV_PARAM_IN)
			
		);
 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "datos actualizados correctamente";

				
			 
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

		 

        $iduint =trim($_POST['iduint']);
		$razons =trim($_POST['razon']);
		$usuarioint =trim($_POST['usuarioint']);
		$contra =trim($_POST['contrasena']);
		$idrol =trim($_POST['idrole']);
	
		
	

		$sql = "exec sp_actusint ?,?,?,?,?";
		$datos = array(
			array($iduint, SQLSRV_PARAM_IN),
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



	if ($_POST['btnopcion']=='actualizartrbot') {

		 

        $idtranbot=trim($_POST["idtranbot"]);
		$ftranbot =trim($_POST['ftranbot']);
		$idperstr =trim($_POST['idperstr']);
		$idcliente =trim($_POST['idcliente']);
		$idcat =trim($_POST['idcat']);
		$transl =trim($_POST['transl']);
		$transexi =trim($_POST['transexi']);
		$tiahorrado =trim($_POST['tiahorrado']);
	
	
		
	

		$sql = "exec usp_updtranbot ?,?,?,?,?,?,?,?";
		$datos = array(
			array($idtranbot, SQLSRV_PARAM_IN),
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





	if ($_POST['btnopcion']=='guardarch') {

		 

      
		$idperso =trim($_POST['idperso']);
		$fechachist =trim($_POST['fechachist']);
		$idcliente =trim($_POST['idcliente']);
		$cantsusch =trim($_POST['cantsusch']);
		$notach =trim($_POST['notach']);
	
	
	
		
	

		$sql = "exec regchist ?,?,?,?,?";
		$datos = array(
			array($idperso, SQLSRV_PARAM_IN),
			array($fechachist, SQLSRV_PARAM_IN),
			array($idcliente, SQLSRV_PARAM_IN),
			array($cantsusch, SQLSRV_PARAM_IN),
			array($notach, SQLSRV_PARAM_IN),
		
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "transaccion guardada correctamente";

				
			 
			} else {
				echo "campos vacios ó registro repetido ";
			}
		}
	}




	
	if ($_POST['btnopcion']=='actualizarch') {

		 

		$idconsumo =trim($_POST['idconsumo']);
		$idperso =trim($_POST['idperso']);
		$fechachist =trim($_POST['fechachist']);
		$idcliente =trim($_POST['idcliente']);
		$cantsusch =trim($_POST['cantsusch']);
		$notach =trim($_POST['notach']);
	
	
	
		
	

		$sql = "exec upchist ?,?,?,?,?,?";
		$datos = array(
			array($idconsumo, SQLSRV_PARAM_IN),
			array($idperso, SQLSRV_PARAM_IN),
			array($fechachist, SQLSRV_PARAM_IN),
			array($idcliente, SQLSRV_PARAM_IN),
			array($cantsusch, SQLSRV_PARAM_IN),
			array($notach, SQLSRV_PARAM_IN),
		
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "transaccion guardada correctamente";

				
			 
			} else {
				echo "campos vacios, fuera de rango o registro repetido ";
			}
		}
	}






	if ($_POST['btnopcion']=='guardarAnul') {

		 

		$idpersanul =trim($_POST['idpersanul']);
		$fechaanul =trim($_POST['fechaanul']);
		$idclienteanul =trim($_POST['idclienteanul']);
		$cantfanul =trim($_POST['cantfanul']);
		$idmotanul =trim($_POST['idmotanul']);
		$autanul =trim($_POST['autanul']);
		$notaanul =trim($_POST['notaanul']);
		$errcli =trim($_POST['errcli']);
		$planacc =trim($_POST['planacc']);
	
	
	
		
	

		$sql = "exec insAnul ?,?,?,?,?,?,?,?,?";
		$datos = array(
			array($idpersanul, SQLSRV_PARAM_IN),
			array($fechaanul, SQLSRV_PARAM_IN),
			array($idclienteanul, SQLSRV_PARAM_IN),
			array($cantfanul, SQLSRV_PARAM_IN),
			array($idmotanul, SQLSRV_PARAM_IN),
			array($autanul, SQLSRV_PARAM_IN),
			array($notaanul, SQLSRV_PARAM_IN),
			array($errcli, SQLSRV_PARAM_IN),
			array($planacc, SQLSRV_PARAM_IN),
		
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "transaccion guardada correctamente";

				
			 
			} else {
				echo "campos vacios, fuera de rango o registro repetido ";
			}
		}
	}







	if ($_POST['btnopcion']=='actualizarAnul') {

		 

		$idanulacion =trim($_POST['idanulacion']);
		$idpersanul =trim($_POST['idpersanul']);
		$fechaanul =trim($_POST['fechaanul']);
		$idclienteanul =trim($_POST['idclienteanul']);
		$cantfanul =trim($_POST['cantfanul']);
		$idmotanul =trim($_POST['idmotanul']);
		$autanul =trim($_POST['autanul']);
		$notaanul =trim($_POST['notaanul']);
		$errcli =trim($_POST['errcli']);
		$planacc =trim($_POST['planacc']);
	
	
	
		
	

		$sql = "exec upAnul ?,?,?,?,?,?,?,?,?,?";
		$datos = array(
			array($idanulacion, SQLSRV_PARAM_IN),
			array($idpersanul, SQLSRV_PARAM_IN),
			array($fechaanul, SQLSRV_PARAM_IN),
			array($idclienteanul, SQLSRV_PARAM_IN),
			array($cantfanul, SQLSRV_PARAM_IN),
			array($idmotanul, SQLSRV_PARAM_IN),
			array($autanul, SQLSRV_PARAM_IN),
			array($notaanul, SQLSRV_PARAM_IN),
			array($errcli, SQLSRV_PARAM_IN),
			array($planacc, SQLSRV_PARAM_IN),
		
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "transaccion guardada correctamente";

				
			 
			} else {
				echo "campos vacios, fuera de rango o registro repetido ";
			}
		}
	}


	
	if ($_POST['btnopcion']=='guardarcomer') {

		 

		$idnomcom =trim($_POST['idnomcom']);
		$servicom =trim($_POST['servicom']);
		$notacom =trim($_POST['notacom']);
		$cuentacom =trim($_POST['cuentacom']);
		$clavecom =trim($_POST['clavecom']);
		$linkcom =trim($_POST['linkcom']);
		$correocom =trim($_POST['correocom']);
		$telecom =trim($_POST['telecom']);
	
	
		
	

		$sql = "exec usp_insertcomer ?,?,?,?,?,?,?,?";
		$datos = array(
			array($idnomcom, SQLSRV_PARAM_IN),
			array($servicom, SQLSRV_PARAM_IN),
			array($notacom, SQLSRV_PARAM_IN),
			array($cuentacom, SQLSRV_PARAM_IN),
			array($clavecom, SQLSRV_PARAM_IN),
			array($linkcom, SQLSRV_PARAM_IN),
			array($correocom, SQLSRV_PARAM_IN),
			array($telecom, SQLSRV_PARAM_IN),
		
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "transaccion guardada correctamente";

				
			 
			} else {
				echo "campos vacios, fuera de rango o cuenta repetida ";
			}
		}
	}

	if ($_POST['btnopcion']=='actualizarcomer') {

		 
        $idcomer=trim($_POST['idcomer']);
		$idnomcom =trim($_POST['idnomcom']);
		$servicom =trim($_POST['servicom']);
		$notacom =trim($_POST['notacom']);
		$cuentacom =trim($_POST['cuentacom']);
		$clavecom =trim($_POST['clavecom']);
		$linkcom =trim($_POST['linkcom']);
		$correocom =trim($_POST['correocom']);
		$telecom =trim($_POST['telecom']);
	
	
		
	

		$sql = "exec upd_Comerci ?,?,?,?,?,?,?,?,?";
		$datos = array(
			array($idcomer, SQLSRV_PARAM_IN),
			array($idnomcom, SQLSRV_PARAM_IN),
			array($servicom, SQLSRV_PARAM_IN),
			array($notacom, SQLSRV_PARAM_IN),
			array($cuentacom, SQLSRV_PARAM_IN),
			array($clavecom, SQLSRV_PARAM_IN),
			array($linkcom, SQLSRV_PARAM_IN),
			array($correocom, SQLSRV_PARAM_IN),
			array($telecom, SQLSRV_PARAM_IN),
		
		
		);

 	
		

		// $exe = $con->query($sql);
		$res = sqlsrv_query($con, $sql,$datos);

// 		print_r($_POST);
// print_r(sqlsrv_errors());

		while ($row = sqlsrv_fetch_array($res)) {

		
			
			if ($row[0]!='error') {
	
					echo "transaccion guardada correctamente";

				
			 
			} else {
				echo "campos vacios, fuera de rango o registro repetido ";
			}
		}
	}

