<?php
$serverName="localhost";

$connectionInfo = array("Database"=>"php","UID"=>"cris2","PWD"=>"asdf","CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName,$connectionInfo);

// if($con){
// echo "db ok";

// } else {
//     print_r(sqlsrv_errors());
// }



?>