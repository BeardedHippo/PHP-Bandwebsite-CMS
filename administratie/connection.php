// Dit bestand zorgt voor de verbinding met de server

<?php

$username = " ";
$password = " ";
$servername = " ";
$dbname = " ";
$connect = new mysqli($servername, $username, $password, $dbname);

if ( $connect -> connect_error ) {
  die( "Er ging iets mis met de verbinding: " . $connect->connect_error);
}

?>