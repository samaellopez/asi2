<?php
session_start();
include_once("db-mysqli.php");
if(isset($_POST["guardar"])){

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$dui = $_POST['dui'];
$nit = $_POST['nit'];
$responsableNombre = $_POST['responsableNombre'];
$responsablecontacto = $_POST['responsablecontacto'];
$alergias = $_POST['alergias'];
$medicamentos = $_POST['medicamentos'];
$fechaRegistro= $_POST['fechaRegistro'];

$consulta= "INSERT INTO pacientes (nombres , apellidos, fecha_nacimiento,genero,direccion,correo,
telefono,dui,nit, responsableNombre, responsablecontacto,alergias,medicamentos,fechaRegistro) 
VALUES ('".$nombres."','".$apellidos."','".$fecha_nacimiento."', '".$genero."', '".$direccion."', '".$correo."',
'".$telefono."', '".$dui."', '".$nit."', '".$responsableNombre."','".$responsablecontacto."','".$alergias."',
'".$medicamentos."','".$fechaRegistro."')"; 

$sentencia = $db->query($consulta);

//$sentencia->bind_param($nombre, $apellidos, $fecha_nacimiento,$genero, 
//	$direccion, $n_telefono,$dui, $nit, $id_persoR,$id_cita, $fecha_ingreso);

//$sentencia->execute();
if($sentencia){
	include_once("mostrarpaciente.php");
	
}

$db->close();


}else
	echo("Error en la conexion");


?>