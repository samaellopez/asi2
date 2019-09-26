<?php
require_once('../db/connection.php');
require_once('../clinic/User.php');

// Recibo los parametros enviados en el POST request.
$user = (isset($_REQUEST['user']) ? $_REQUEST['user'] : '');
$role = (isset($_REQUEST['role']) ? $_REQUEST['role'] : '');
$password = (isset($_REQUEST['password']) ? $_REQUEST['password'] : '');

// Limpiamos
$user = $con->real_escape_string($user);
$role = $con->real_escape_string($role);

/* NOTA: Recordar que la longitud máxima de contraseña debe de ser de 72 caracteres */
// https://www.php.net/manual/en/function.password-hash.php

// Server Response
header('Content-Type: application/json');
$response = ["status" => false];
if (strlen($password) > 72) {
  $response["msg"] = "Contraseña muy larga.";
} else {
  $_User = new User($con);
  $status = 1;

  if (!$_User->create($user, $password, $role, 1))
    $response["msg"] = "No se pudo crear al usuario.";
  else
    $response = ["status" => true, "msg" => "Se ha creado al usuario con éxito."];
}

echo json_encode($response);