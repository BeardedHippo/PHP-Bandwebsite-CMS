<?php
$username = " ";
$password = " ";
$servername = " ";
$dbname = " ";
$connect = new mysqli($servername, $username, $password);

if ( $connect -> connect_error ) {
  die( "Er ging iets mis met de verbinding: " . $connect->connect_error);
}
echo "Verbonden met de database!<br>";

$sql = "CREATE DATABASE marcellos";
if ($connect-> query($sql) === TRUE) {
  echo "Database gemaakt.<br>";
} else {
  echo "Er is iets mis gegaan met het maken van een database: " . $connect->error;
}

$connect = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE gebruiker (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(30) NOT NULL,
  password VARCHAR(255)
)";

if ( $connect -> query($sql) === TRUE ) {
  echo "Gebruikerstabel gemaakt...<br>";
} else {
  echo "Het is niet gelukt om een gebruikerstabel te maken: " . $connect->error;
}

$sql = "CREATE TABLE paginas (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  paginanaam VARCHAR(250) NOT NULL,
  content TEXT NOT NULL
)";

if ( $connect -> query($sql) === TRUE ) {
  echo "Paginatabel gemaakt...<br>";
} else {
  echo "Het is niet gelukt om een paginatabel te maken: " . $connect->error;
}

$sql = "CREATE TABLE fotogallerij (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  imgtitel VARCHAR(250) NOT NULL,
  imgurl VARCHAR(250) NOT NULL,
  imgtext TEXT NOT NULL
)";

if ( $connect -> query($sql) === TRUE ) {
  echo "Fototabel gemaakt...<br>";
} else {
  echo "Het is niet gelukt om een fototabel te maken: " . $connect->error;
}

$sql = "CREATE TABLE slider (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  imgtitel VARCHAR(250) NOT NULL,
  imgurl VARCHAR(250) NOT NULL,
  imgtext TEXT NOT NULL
)";

if ( $connect -> query($sql) === TRUE ) {
  echo "Slidertabel gemaakt...<br>";
} else {
  echo "Het is niet gelukt om een slidertabel te maken: " . $connect->error;
}

$sql = "INSERT INTO slider (imgtitel, imgurl, imgtext) VALUES ('Slide 1', 'text2')";
if ( $connect -> query($sql) === TRUE) {
  echo "Sliderfoto ingevoegd...<br>";
} else {
  echo "Sliderfoto is niet ingevoegd: " . $connect->error;
}

$sql = "INSERT INTO slider (imgtitel, imgurl, imgtext) VALUES ('Slide 2', 'text2')";
if ( $connect -> query($sql) === TRUE) {
  echo "Sliderfoto ingevoegd...<br>";
} else {
  echo "Sliderfoto is niet ingevoegd: " . $connect->error;
}

$sql = "INSERT INTO slider (imgtitel, imgurl) VALUES ('Slide 3', 'text3')";
if ( $connect -> query($sql) === TRUE) {
  echo "Sliderfoto ingevoegd...<br>";
} else {
  echo "Sliderfoto is niet ingevoegd: " . $connect->error;
}

$sql = "INSERT INTO gebruiker (user, password) VALUES ('demo', '\$2y\$10\$BG37JaJx/BnhhCeNNbCyK.tY9chxvuU/JpnYZznvKS/PkKbEnBtgG')";

if ( $connect -> query($sql) === TRUE) {
  echo "Account theroselles gemaakt...<br>";
} else {
  echo "Account is niet gemaakt: " . $connect->error;
}

$sql = "INSERT INTO paginas (paginanaam, content) VALUES ('about', 'tekst')";
if ( $connect -> query($sql) === TRUE) {
  echo "Rosellespagina gemaakt...<br><b>Prima database vandaag!</b>";
} else {
  echo "Rosellespagina is niet gemaakt: " . $connect->error;
}

$connect->close();
?>
