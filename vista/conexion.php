<?php
$serverName="localhost";

$connectionInfo = array("Database"=>"modulos","UID"=>"cris2","PWD"=>"asdf","CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName,$connectionInfo);

// if($con){
// echo "db ok";

// } 
// else {
//     print_r(sqlsrv_errors());
// }

?>



 <?php
// $connectionInfo = array("UID" => "cris2", "pwd" => "EnergyMaster2020*", "Database" => "modulos", "LoginTimeout" => 30, "Encrypt" => 1,"CharacterSet"=>"UTF-8", "TrustServerCertificate" => 0);

// $serverName = "tcp:modserver.database.windows.net,1433";

// $con = sqlsrv_connect($serverName, $connectionInfo);

?> 