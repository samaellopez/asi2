<?php
require_once('config.php');

// Creamos la conexion
$con = new mysqli(host, user, pass, dbname, port);

if ($con->connect_errno)
  die('Error de conexion: ' . mysqli_error($con));
else {
  // Establecemos el charset
  $con->set_charset("utf8mb4");
  $db = $con->select_db(dbname);
  if ($db == 0) die('No se pudo conectar a la base de datos.');
}
