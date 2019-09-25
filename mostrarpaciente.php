<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <link rel="stylesheet" href="css/vertical-nav.css" />
 <link rel="stylesheet" href="css/table-column-options.css" />
 <link rel="stylesheet" href="css/links.css" />
 <link rel="stylesheet" href="css/libros.css" />
 <!-- <link rel="stylesheet" href="css/libros.css" /> -->
 <script src="js/modernizr.custom.lis.js"></script>
</head>
<body>
<header>
 <h1 class="3d-text">Registro paciente</h1>
</header>
<section>
<article>
<?php
 //Incluir librería de conexión a la base de datos
 include_once("db-mysqli.php");
 //Si se ha llamado esta página desde el formulario
 //para modificar libros ejecutar primero la actualización
 //del registro
 if(isset($_POST["enviar"])){
 //Creando variables locales con los datos enviados
 //desde el formulario de modificación
    $id_paciente = isset($_POST['id_paciente']) ? trim ($_POST['id_paciente']) : "";
	$nombres = isset($_POST['nombres']) ? trim ($_POST['nombres']) : "";
	$apellidos = isset ($_POST['apellidos']) ? trim ($_POST['apellidos']) : "";
	$fecha_nacimiento = isset ($_POST['fecha_nacimiento']) ? trim ($_POST['fecha_nacimiento']) : "";
	$genero = isset ($_POST['genero']) ? trim  ($_POST['genero']) : "";
	$direccion = isset ($_POST['direccion']) ? trim ($_POST['direccion']) : "";
	$correo = isset($_POST['correo']) ? trim ($_POST['correo']) : "";
	$telefono = isset ($_POST['telefono']) ? trim ($_POST['telefono']) : "";
	$dui = isset ($_POST['dui']) ? trim  ($_POST['dui']) : "";
	$nit = isset ($_POST['nit']) ? trim  ($_POST['nit']) : "";
	$responsableNombre = isset ($_POST['responsableNombre']) ? trim  ($_POST['responsableNombre']) : "";
    $responsablecontacto = isset ($_POST['responsablecontacto']) ? trim  ($_POST['responsablecontacto']) : "";
	$alergias  = isset ($_POST['alergias']) ? trim ($_POST['alergias']) : "";
	$medicamentos  = isset ($_POST['medicamentos']) ? trim ($_POST['medicamentos']) : "";
	$fechaRegistro  = isset ($_POST['fechaRegistro']) ? trim ($_POST['fechaRegistro']) : "";
	
 //Verificando que se hayan ingresado datos
 //en todos los controles del formulario
 if(empty ($nombres) || empty ($apellidos) ||  empty ($fecha_nacimiento) || empty ($genero)  || empty ($direccion) ||   empty ($correo) 
||   empty ($telefono) || empty ($dui) ||  empty ($nit) || empty ($responsableNombre) || empty ($responsablecontacto) || empty ($alergias) || 
 empty ($medicamentos)  || empty ($fechaRegistro)){
 $msg = "Existen campos en el formulario sin llenar. ";
 $msg .= "Regrese al formulario y llene todos los campos. <br>\n";
 $msg .= "[<a href=\"Cregistrarpaciente.php?nombres=" . $nombres . "\">Volver</a>]\n";
 echo $msg;
 exit(0);
 }
 if(!get_magic_quotes_gpc()){
 $nombres = addslashes($nombres);
 $apellidos = addslashes($apellidos);
 $fecha_nacimiento = date($fecha_nacimiento);
 $genero = addslashes($genero);
 $direccion = addslashes($id_direccion);
 $correo = addslashes($correo);
 $telefono = intval($telefono);
 $dui = intval($dui);
 $nit = intval($nit);
 $responsableNombre= addslashes($responsableNombre);
 $responsablecontacto= addslashes($responsablecontacto);
 $alergias = addslashes($alergias);
 $medicamentos = addslashes($medicamentos);
 $fechaRegistro = date($fechaRegistro);
 }
 //Creando la consulta de actualización con los datos
 //enviados del formulario de modificación de libros
 $consulta = "UPDATE pacientes SET nombres='" . $nombres . "', dui='" . $dui;
 $consulta .= "', nombres='" . $nombres . "', apellidos=" . $apellidos . " WHERE nombres='" .$nombres . "'";
 //Ejecutando la consulta de actualización
 $resultc = $db->query($consulta);
 //Obteniendo el número de registros actualizados
 $num_results = $db->affected_rows;
 echo "<div class=\"query\">\n\t<p>";
 echo "\t\t" . $num_results . " fila(s) actualizada(s)\n";
 echo "\t</p>\n</div>\n";
 $_POST['opc'] = "guardar";
 }
 /*if(isset($_POST["del"]) && $_POST["del"]== "s"){
 $consulta = "DELETE FROM paciente WHERE nombre='" . $_POST["id_paciente"] . "'";
 $resultc = $db->query($consulta);
 $num_results = $db->affected_rows;
 echo "<div class=\"query\">\n\t<p>" . $consulta . "</p>\n";
 echo "Se ha eliminado" . $num_results . " id_cita  = " . $_GET['id_cita'] .
"\n</div>\n";
 }*/
 //Haciendo una consulta de todos los libros presentes
 //en la tabla libros
 $consulta = "SELECT * FROM pacientes ORDER BY 	nombres";
 //Ejecutando la consulta a través del objeto $db
 $resultc = $db->query($consulta);
 //Obteniendo el número de registros devueltos
 //$num_results = $resultc->mysqli_num_rows;
 echo "<table class=\"color-table\">\n
 \t\t\t<th>NOMBRES</th>\n
 \t\t\t<th>APELLIDOS</th>\n
 \t\t\t<th>FECHA NACIMIENTO</th>\n
 \t\t\t<th>GENERO</th>\n
 \t\t\t<th>DIRECCION</th>\n
 \t\t\t<th>	CORREO</th>\n
 \t\t\t<th>TELEFONO</th>\n
 \t\t\t<th>DUI</th>\n
 \t\t\t<th>NIT</th>\n
 \t\t\t<th>NOMBRE PERSONARESPONSABLE</th>\n
 \t\t\t<th>TELEFONO PERSONARESPONSABLE</th>\n
  \t\t\t<th>ALERGIAS</th>\n
 \t\t\t<th>MEDICAMENTOS</th>\n
  \t\t</tr>\n
 \t</thead>\n
 \t<tbody>\n";
 while($row = $resultc->fetch_assoc()){
 echo "\t\t<tr class=\"normal\" onmouseover=\"this.className='selected'\"
onmouseout=\"this.className='normal'\">\n";
 echo "\t\t\t<td>\n";
 echo "\t\t\t\t" . stripslashes($row['nombres']) . "\n";
 echo "\t\t\t</td>\n\t\t\t<td>\n";
 echo "\t\t\t\t" . stripslashes($row['apellidos']) . "\n";
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['fecha_nacimiento'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['genero'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['direccion'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['correo'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['telefono'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['dui'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['nit'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['responsableNombre'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['responsablecontacto'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['alergias'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 echo "\t\t\t\t" . $row['medicamentos'];
 echo "\t\t\t</td>\n\t\t\t<td> \n";
 }
 echo "\t</tbody>\n";
 echo "\t\t\t<th colspan=\"5\">\n";
?>
 
<a href="registrar_paciente.php" class="a-btn">
<button class="a-btn-text" name="regresar" value="Regresar"> Regresar </button>


</a>
</body>
</html>