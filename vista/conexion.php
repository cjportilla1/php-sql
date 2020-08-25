<?php
$connectionInfo = array("UID" => "cris2", "pwd" => "EnergyMaster2020*", "Database" => "modulos", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);

$serverName = "tcp:modserver.database.windows.net,1433";

$con = sqlsrv_connect($serverName, $connectionInfo);

?>