<?php
session_start();
include_once("db-mysqli.php");
if(isset($_POST["enviar"])){


$sintoma= $_POST['sintoma'];
$diagnostico = $_POST['diagnostico'];
$tratamiento = $_POST['tratamiento'];



$consulta= "INSERT INTO motivo_consulta(sintoma , diagnostico, tratamiento) VALUES ('".$sintoma."','".$diagnostico."',  '".$tratamiento."')"; 




$sentencia = $db->query($consulta);
//$sentencia->bind_param($nombre, $apellidos, $fecha_nacimiento,$genero, 
//	$direccion, $n_telefono,$dui, $nit, $id_persoR,$id_cita, $fecha_ingreso);

//$sentencia->execute();
if($sentencia){
	include_once("edit_observaciones.php" );

}

$db->close();


}else
	echo("Error en la conexion");
	

?>