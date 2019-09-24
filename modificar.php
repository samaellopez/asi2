<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Modificar observaciones</title>
 <link rel="stylesheet" href="css/vertical-nav.css" />
 <link rel="stylesheet" href="css/formoid-solid-purple.css" />
 <link rel="stylesheet" href="css/links.css" />
 <!-- <link rel="stylesheet" href="css/formdesign.css" /> -->
 <script src="js/modernizr.custom.lis.js"></script>
</head>
<body>
<header>
 <h1 class="3d-text">Modificar </h1>
</header>
<section>
<article>
<?php
 //Incluir librería de conexión a la base de datos
 include_once("db-mysqli.php");

 //Haciendo una consulta de todos los libros presentes
 //en la tabla libros
 $consulta = "SELECT * FROM motivo_consulta WHERE sintoma='" . $_GET['sintoma'] . "'";
 //echo $consulta . "<br>\n";
 //Ejecutando la consulta a través del objeto $db
 $resultc = $db->query($consulta);
 //Obteniendo el número de registros devueltos
 $num_results = $resultc->num_rows;
 $row = $resultc->fetch_assoc();
?>

<form action="edit_observaciones.php?sintoma=<?php echo $_GET['sintoma'] ?>" method="POST" class="formoidsolid-purple">

 <div class="title">
 <h2>Modificar informacion de paciente</h2>
 </div>
 <div class="element-number">
 <label class="title"></label>
 <div class="item-cont">
 <input type="text" name="sintoma" value="<?php echo $_GET['sintoma'] ?>" maxlength="18"
placeholder="SINTOMA" class="large" />
 <span class="icon-place"></span>
 </div>
 </div>
 <div class="element-name">
 <label class="title"></label>
 <div class="nameFirst">
 <input type="text" name="diagnostico" value="<?php echo $row['diagnostico'] ?>" maxlength="50"
placeholder="DIAGNOSTICO" class="large" />
 <span class="icon-place"></span>
 </div>
 </div>
 <div class="element-input">
 <label class="title"></label>
 <div class="item-cont">
 <input type="text" name="tratamiento" value="<?php echo $row['tratamiento'] ?>"
maxlength="70" placeholder="TRATAMIENTO" class="large" />
 <span class="icon-place"></span>
 </div>
 </div>
 <div class="submit">
 <input type="submit" name="guardar" value="Guardar" />
 </div>
</form>

<a href="edit_observaciones.php?opc=modificar" class="a-btn">
 <span class="a-btn-text">Volver</span>
 <span class="a-btn-slide-icon"></span>
</a>
</article>
</section>
</body>
