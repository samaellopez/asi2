<?php
session_start();

if (empty($_SESSION['logged'])) {
  echo file_get_contents('templates/unauthorized.html');
} else {
  // Evaluamos rol. 
  $sidebar = file_get_contents('../templates/components/sidebar.html');
  $topbar = file_get_contents('../templates/components/topbar.html');
  $footer = file_get_contents('../templates/components/footer.html');
  $main = file_get_contents('../templates/main.html');

  $main = preg_replace('/--sidebar--/', $sidebar, $main);
  $main = preg_replace('/--topbar--/', $topbar, $main);
  $main = preg_replace('/--footer--/', $footer, $main);

  if ($_SESSION['rol'] == 2) { // Rol == secretaria
    $content = file_get_contents('../templates/forms/registrar_paciente.html');
    $main = preg_replace('/--content--/', $content, $main);
  }

  echo $main;
}
