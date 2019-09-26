<?php
require_once('db/connection.php');

$user = (isset($_REQUEST['user']) ? $_REQUEST['user'] : '');
$password = (isset($_REQUEST['password']) ? $_REQUEST['password'] : '');

$user = mysqli_real_escape_string($con, $user);

$query = mysqli_query($con, "SELECT * FROM login WHERE username = '$user' AND estado = 1");

// Evaluamos el resultado de la base de datos
if ($query->num_rows == 0) echo 'Usuario no existe';
else {
  $row = $query->fetch_assoc();
  // Comparamos contraseña
  if (password_verify($password, $row['password'])) {
    session_start();
    // Establecemos los parametros de sesion
    $_SESSION['logged'] = 'true';
    $_SESSION['rol'] = $row['rol'];
    $_SESSION['id_usuario'] = $row['id_usuario'];

    echo 'Autorizado';
  } else echo 'Usuario o contraseña incorrectos.';
}
