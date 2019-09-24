<?php

$db = NULL;
//Datos de conexión
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBDATA", "clinica-fixed");
//Creando el objeto de conexión a la base de datos con MySQLi

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATA);
//Verificar que la conexión se ha realizado o terminar
//el programa o secuencia de comando si no ha sido así
if($db->connect_errno){
 die("No se ha podido conectar a MySQL: (" . $db->connect_errno . ")" . $db->connect_error);
}
//Establecer el conjunto de caracteres para no tener problemas
//con los caracteres especiales del idioma español
$db->set_charset("utf8");


function usuario_get($id, $medico){
    if(!$id) return 'Usuario no válido';

    $db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATA);
    $query = $medico? 'SELECT CONCAT_WS(" ", "Dr.", nombre, apellidos) as nombre FROM medico WHERE id_medico='.$id.' LIMIT 1':'SELECT CONCAT_WS(" ", "Sria.", username) as nombre FROM login WHERE id_usuario='.$id.' LIMIT 1';        
    $result = $db->query($query);
    return ($usuario = $result->fetch_assoc())? $usuario['nombre'] : 'Usuario no válido';
}

function cita_list_get($medico, $id){
    $where = $medico? 'WHERE id_medico='.$id.' AND fecha >= CURDATE()':'WHERE fecha = CURDATE()';
    $db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATA);
    $query = 'SELECT c.*, p.* FROM cita c LEFT JOIN paciente p USING(id_paciente) '.$where.' ORDER BY fecha ASC, hora ASC';
    $result = $db->query($query);
    return $result;
}
?>