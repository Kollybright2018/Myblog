<?php
$servername= "localhost";
$username = "root";
$password = "";
$databasename="Myblog";
$dbc = new mysqli ($servername, $username, $password, $databasename);

if ($dbc->connect_error) {
    die( $dbc->connect_error);
}else{
    ;
}


?>