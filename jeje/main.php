<?php
// Reanudamos o iniciamos la sesion
session_start();

// Evaluamos si la variable 'logged' ya fue populada
if (empty($_SESSION['logged'])) {
  // Lo enviamos a la pagina 'unauthorized'
  echo file_get_contents('templates/unauthorized.html');
} else {
  // Enviamos a INDEX.php a evaluar los roles de usuario.
  header("Location:clinic/index.php");
}