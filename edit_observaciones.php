<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 
 <link rel="stylesheet" href="css/vertical-nav.css" />
 <link rel="stylesheet" href="css/libros.css" />
 <link rel="stylesheet" href="css/links.css" />
 <script src="js/modernizr.custom.lis.js"></script>
</head>
<header>
 <h1 class="3d-text">Observaciones</h1>
</header>
<body>
<?php
 //Incluir librería de conexión a la base de datos
 include_once("db-mysqli.php");
 //Si se ha llamado esta página desde el formulario
 //para modificar libros ejecutar primero la actualización
 //del registro
 if(isset($_POST['guardar'])){
 //Creando variables locales con los datos enviados
 //desde el formulario de modificación
 
 $sintoma = isset($_POST['sintoma']) ? trim ($_POST['sintoma']) : "";
 $diagnostico = isset ($_POST['diagnostico']) ? trim ($_POST['diagnostico']) : "";
 $tratamiento = isset ($_POST['tratamiento']) ? trim ($_POST['tratamiento']) : "";

 //Verificando que se hayan ingresado datos
 //en todos los controles del formulario
 if(empty($sintoma) || empty($diagnostico) || empty( $tratamiento)){
 $msg = "Existen campos en el formulario sin llenar. ";
 $msg .= "Regrese al formulario y llene todos los campos. <br>\n";
 $msg .= "[<a href=\"modificar.php?sintoma=" . $sintoma . "\">Volver</a>]\n";
 $msg .= "[<a href=\"observaciones.php?sintoma=" . $sintoma . "\">Volver</a>]\n";
 echo $msg;
 exit(0);
 }
 if(!get_magic_quotes_gpc()){
$sintoma = addslashes($sintoma);
$diagnostico = addslashes($diagnostico);
$tratamiento = addslashes($tratamiento);
 
 }
 //Creando la consulta de actualización con los datos
 //enviados del formulario de modificación de libros
 $consulta =  "UPDATE motivo_consulta SET sintoma='" . $sintoma . "', diagnostico='" . $diagnostico;
 $consulta .=  "sintoma='" . $sintoma . "', diagnostico='" . $diagnostico."',tratamiento=" . $tratamiento ." WHERE sintoma='" .$sintoma . "'";
 
 //Ejecutando la consulta de actualización
 $resultc = $db->query($consulta);
 //Obteniendo el número de registros actualizados
 $num_results = $db->affected_rows;
 echo "<div class=\"query\">\n\t<p>";
 echo "\t\t" . $num_results . " fila(s) actualizada(s)\n";
 echo "\t</p>\n</div>\n";
 $_GET['opc'] = "modificar";
 }
 if(isset($_GET['del']) && $_GET['del']== "s"){
 $consulta = "DELETE FROM motivo_consulta WHERE sintoma='" . $_GET['id'] . "'";
 $resultc = $db->query($consulta);
 $num_results = $db->affected_rows;
 echo "<div class=\"query\">\n\t<p>" . $consulta . "</p>\n";
 echo "Se ha eliminado" . $num_results . " sintoma = " . $_GET['id'] .
"\n</div>\n";
 }
 //Haciendo una consulta de todos los libros presentes
 //en la tabla libros
 $consulta = "SELECT * FROM motivo_consulta ORDER BY sintoma";
 //Ejecutando la consulta a través del objeto $db
 $resultc = $db->query($consulta);
 //Obteniendo el número de registros devueltos
 $num_results = $resultc->num_rows;
 echo "<table class=\"color-table\">\n
 \t<colgroup>\n
 \t\t<col class=\"isbn\">\n
 \t</colgroup>\n
 \t<colgroup>\n
 \t\t<col class=\"info\">\n
 \t\t<col class=\"info\">\n
 \t</colgroup>\n
 \t<colgroup>\n
 \t\t<col class=\"price\">\n
 \t</colgroup>\n
 \t<colgroup>\n
 \t\t<col class=\"action\">\n
 \t</colgroup>\n
 \t<thead>\n
 \t\t\t<th>SINTOMA</th>\n
 \t\t\t<th>DIAGNOSTICO</th>\n
 \t\t\t<th>TRATAMIENTO</th>\n
 \t\t</tr>\n
 \t</thead>\n
 \t<tbody>\n";
 while($row = $resultc->fetch_assoc()){
 echo "\t\t<tr class=\"normal\" onmouseover=\"this.className='selected'\"
onmouseout=\"this.className='normal'\">\n";
 echo "\t\t\t<td>\n";
 echo "\t\t\t\t" . $row['sintoma'] . "\n";
 echo "\t\t\t</td>\n\t\t\t\t<td>\n";
 echo "\t\t\t\t" . stripslashes($row['diagnostico']) . "\n";
 echo "\t\t\t</td>\n\t\t\t<td>\n";
 echo "\t\t\t\t" . stripslashes($row['tratamiento']) . "\n";
 echo "\t\t\t</td>\n\t\t\t<td align=\"center\">\n";
 echo "\t\t\t\t[<a href=\"" . $_GET['opc'] . "modificar.php?sintoma=" . $row['sintoma'] . "\">\n";
 echo "\t\t\t\t\t" . $_GET['opc'] . "\n";
 echo "\t\t\t\t</a>]\n";
 echo "\t\t\t</td>\n\t\t</tr>\n";
 }
 echo "\t</tbody>\n";
 echo "\t<tfoot>\n";
 echo "\t\t<tr id=\"tfooter\">\n";
 echo "\t\t\t<th colspan=\"5\">\n";

?>
<a href="observacionesform.php" class="a-btn">
 <span class="a-btn-text">Regresar</span>
 <span class="a-btn-slide-icon"></span>
</a>
</body>
</html>