<?php

$host="host=127.0.0.1";
$port="port=5433";
$dbname="dbname=fams_project";
$credentials="user=postgres password=Rupali";


$con = pg_pconnect("$host $port  $dbname $credentials ");
if( !$con ) {
echo 'Connection not  established';

die("Error");
}
else{
    // echo "success";
}

?>
